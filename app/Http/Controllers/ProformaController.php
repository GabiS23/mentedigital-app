<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ProformaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function proforma()
    {

        $lista_empresa= DB::select('SELECT 
        id_empresa, 
        nombre_marca
        FROM pro.tempresa 
        order by id_empresa DESC');

        $lista_proformas=DB::select('SELECT p.id_proforma, p.fecha_reg, p.nro_proforma,u.name, p.estado, e.nombre_marca
        FROM pro.tproforma p
        join pro.tempresa e on e.id_empresa=p.id_empresa
        join segu.users u on u.id=p.id_usuario_reg;');

        $arrayParametros = array(
            'lista_empresa' => $lista_empresa,
            'lista_proformas' => $lista_proformas
            
            ); 

        return view('contenedor.admin.proformas.proforma',$arrayParametros);

    }
    public function form_nueva_proforma()
    {
        $lista_empresa= DB::select('SELECT 
        id_empresa, 
        nombre_marca
        FROM pro.tempresa 
        order by id_empresa DESC');

        // Form nueva proforma

        $query="with recursive tree as (
            select 
            vc.id_seccion_servicio,
            case when vc.nombre is null then pd.nombre_plataforma_digital else vc.nombre end as nombre,
	        vc.descripcion,
            vc.id_padre,
            vc.id_seccion_servicio::text as orden,
	        n.codigo_nivel,
	        vc.precio,
	        vc.cantidad_servicio
            from pro.seccion_servicio vc
	        join pro.tnivel n on n.id_nivel=vc.id_nivel
	        left join pro.tplataforma_digital pd on pd.id_plataforma_digital=vc.id_plataforma_digital
            where n.codigo_nivel='pla'
            union all
	
	        select 
            vc.id_seccion_servicio,
            case when vc.nombre is null then pd.nombre_plataforma_digital else vc.nombre end as nombre,
	        vc.descripcion,
            vc.id_padre,
            (t.orden || '->' || vc.id_seccion_servicio)::text as orden,
	        n.codigo_nivel,
	        vc.precio,
	        vc.cantidad_servicio
            from pro.seccion_servicio vc
	        join pro.tnivel n on n.id_nivel=vc.id_nivel
            --where n.codigo_nivel='pla'
	   	    join tree t on t.id_seccion_servicio=vc.id_padre
	        left join pro.tplataforma_digital pd on pd.id_plataforma_digital=vc.id_plataforma_digital
		    where n.codigo_nivel not in ('fac','ins','whabus','tik','web')
            )
			select
			t.id_seccion_servicio,
			t.nombre ,t.descripcion,
			pd.nombre_plataforma_digital,
			pd.plataforma_digital_descripcion,
			t.codigo_nivel,
			t.precio,
			t.cantidad_servicio
			from tree t 
			left join pro.seccion_servicio s on s.id_seccion_servicio::varchar = (split_part(t.orden,'->',2))::varchar
			left join pro.tplataforma_digital pd on pd.id_plataforma_digital=s.id_plataforma_digital
			where t.codigo_nivel!='esp'
			order by t.orden asc";
        $lista_servicios = DB::select($query);

        // Fin de form nueva proforma
        // dd($lista_servicios);
        $arrayParametros = array(
            'lista_empresa' => $lista_empresa,
            'lista_servicios' => $lista_servicios
            ); 

        return view('contenedor.admin.proformas.form_nueva_proforma',$arrayParametros);
    }
    public function guardar_proforma(Request $request){
        // $user = auth()->user();
        // $id = Auth::id();
        // dd($id);

 
        // Form nueva proforma2

        $query="with recursive tree as (
            select 
            vc.id_seccion_servicio,
            case when vc.nombre is null then pd.nombre_plataforma_digital else vc.nombre end as nombre,
            vc.descripcion,
            vc.id_padre,
            vc.id_seccion_servicio::text as orden,
            n.codigo_nivel,
            vc.precio,
            vc.cantidad_servicio
            from pro.seccion_servicio vc
            join pro.tnivel n on n.id_nivel=vc.id_nivel
            left join pro.tplataforma_digital pd on pd.id_plataforma_digital=vc.id_plataforma_digital
            where n.codigo_nivel='pla'
            union all

            select 
            vc.id_seccion_servicio,
            case when vc.nombre is null then pd.nombre_plataforma_digital else vc.nombre end as nombre,
            vc.descripcion,
            vc.id_padre,
            (t.orden || '->' || vc.id_seccion_servicio)::text as orden,
            n.codigo_nivel,
            vc.precio,
            vc.cantidad_servicio
            from pro.seccion_servicio vc
            join pro.tnivel n on n.id_nivel=vc.id_nivel
            --where n.codigo_nivel='pla'
            join tree t on t.id_seccion_servicio=vc.id_padre
            left join pro.tplataforma_digital pd on pd.id_plataforma_digital=vc.id_plataforma_digital
            where n.codigo_nivel not in ('fac','ins','whabus','tik','web')
            )
            select
            t.id_seccion_servicio,
            t.nombre ,t.descripcion,
            pd.nombre_plataforma_digital,
            pd.plataforma_digital_descripcion,
            t.codigo_nivel,
            t.precio,
            t.cantidad_servicio,

            'pre_'||t.id_seccion_servicio as precio_get,
            'cant_'||t.id_seccion_servicio as cantidad_get,
            'check_'||t.id_seccion_servicio as check_get

            from tree t 
            left join pro.seccion_servicio s on s.id_seccion_servicio::varchar = (split_part(t.orden,'->',2))::varchar
            left join pro.tplataforma_digital pd on pd.id_plataforma_digital=s.id_plataforma_digital
            where t.codigo_nivel!='esp'
            order by t.orden asc";

        $lista_servicios = DB::select($query);

        $res ='';

        DB::insert('INSERT INTO pro.tproforma(
            fecha_reg, nro_proforma, estado, id_empresa, costo_total,id_usuario_reg)
           VALUES ( now()::TIMESTAMP, ?, ?, ?, ?, ?);',[10,$request->estado,$request->id_empresa,0,(int)Auth::id()]);

        $ultima_proforma=DB::select("SELECT max(id_proforma) as id_proforma FROM pro.tproforma;");
        $id_proforma=$ultima_proforma[0]->id_proforma;


        foreach ($lista_servicios as $p) {

            if($request->input($p->check_get)){

                $res.=$p->id_seccion_servicio.'->'.$request->input($p->precio_get).'->'.$request->input($p->cantidad_get).'->'.$request->input($p->precio_get) * $request->input($p->cantidad_get).'->'.$request->id_empresa.'->'.$request->fecha.'->'.$request->estado;
                $this->InsertarProforma($id_proforma,$p->id_seccion_servicio,$request->input($p->precio_get),$request->input($p->cantidad_get),($request->input($p->precio_get) * $request->input($p->cantidad_get)));

            }

        }
        // Fin de form nueva proforma2
        //dd($request->all());
        
        
        $lista_empresa= DB::select('SELECT 
        id_empresa, 
        nombre_marca
        FROM pro.tempresa 
        order by id_empresa DESC');

        $lista_proformas=DB::select('SELECT p.id_proforma, p.fecha_reg, p.nro_proforma,u.name, p.estado, e.nombre_marca
        FROM pro.tproforma p
        join pro.tempresa e on e.id_empresa=p.id_empresa
        join segu.users u on u.id=p.id_usuario_reg;');

        $arrayParametros = array(
            'lista_empresa' => $lista_empresa,
            'lista_proformas' => $lista_proformas
            ); 

        return view('contenedor.admin.proformas.proforma',$arrayParametros);

    }
    public function InsertarProforma($id_proforma,$id_seccion_servicio,$precio,$cantidad,$sub_total){

        //OBTENER EL UTIMO ID DE PROFOMA PARA REGISTRAR AL DETALLE

            DB::INSERT('INSERT INTO pro.tproforma_detalle(
                 id_proforma, id_seccion_servicio, precio_unitario, cantidad_servicio, sub_total)
                VALUES ( ?, ?, ?, ?, ?);',[$id_proforma,$id_seccion_servicio,$precio,$cantidad,$sub_total]);
    }
    // public function form_proforma()
    // {
    //     return view('contenedor.admin.proformas.form_proforma'); 
    // }
    public function form_editar_proforma($id){
        // dd($id);
        $lista_empresa= DB::select('SELECT 
        id_empresa, 
        nombre_marca
        FROM pro.tempresa');

        $lista_empresa_seleccionada= DB::select('SELECT 
        e.id_empresa, 
        e.nombre_marca
        FROM pro.tempresa e
        join pro.tproforma p on p.id_empresa=e.id_empresa where p.id_proforma=?',[$id]);
      

        $estado_seleccionado= DB::select('SELECT estado
                             FROM pro.tproforma where id_proforma=?',[$id]);
                            //  dd($lista_empresa_seleccionada[0]->id_empresa);

        // Form nueva proforma

        $query="with recursive tree as (
            select 
            vc.id_seccion_servicio,
            case when vc.nombre is null then pd.nombre_plataforma_digital else vc.nombre end as nombre,
	        vc.descripcion,
            vc.id_padre,
            vc.id_seccion_servicio::text as orden,
	        n.codigo_nivel,
	        vc.precio,
	        vc.cantidad_servicio
            from pro.seccion_servicio vc
	        join pro.tnivel n on n.id_nivel=vc.id_nivel
	        left join pro.tplataforma_digital pd on pd.id_plataforma_digital=vc.id_plataforma_digital
            where n.codigo_nivel='pla'
            union all
	
	        select 
            vc.id_seccion_servicio,
            case when vc.nombre is null then pd.nombre_plataforma_digital else vc.nombre end as nombre,
	        vc.descripcion,
            vc.id_padre,
            (t.orden || '->' || vc.id_seccion_servicio)::text as orden,
	        n.codigo_nivel,
	        vc.precio,
	        vc.cantidad_servicio
            from pro.seccion_servicio vc
	        join pro.tnivel n on n.id_nivel=vc.id_nivel
            --where n.codigo_nivel='pla'
	   	    join tree t on t.id_seccion_servicio=vc.id_padre
	        left join pro.tplataforma_digital pd on pd.id_plataforma_digital=vc.id_plataforma_digital
		    where n.codigo_nivel not in ('fac','ins','whabus','tik','web')
            )
			select
			pdt.id_seccion_servicio,
			t.nombre ,t.descripcion,
			pd.nombre_plataforma_digital,
			pd.plataforma_digital_descripcion,
			t.codigo_nivel,
			pdt.precio_unitario as precio,
			pdt.cantidad_servicio,
			
            'pre_'||t.id_seccion_servicio as precio_get,
            'cant_'||t.id_seccion_servicio as cantidad_get,
            'check_'||t.id_seccion_servicio as check_get

			from tree t 
			left join pro.seccion_servicio s on s.id_seccion_servicio::varchar = (split_part(t.orden,'->',2))::varchar
			left join pro.tplataforma_digital pd on pd.id_plataforma_digital=s.id_plataforma_digital
			
			left join pro.tproforma_detalle pdt on pdt.id_seccion_servicio=t.id_seccion_servicio
			
			where t.codigo_nivel!='esp' and pdt.id_proforma= ".$id."
			order by t.orden asc";

        $lista_servicios = DB::select($query);
        // Fin de form nueva proforma
        // dd($lista_servicios);
        $arrayParametros = array(
            'lista_empresa' => $lista_empresa,
            'lista_servicios' => $lista_servicios,
            'estado_seleccionado'=>$estado_seleccionado,
            'id_empresa'=>$lista_empresa_seleccionada[0]->id_empresa,
            'id_proforma'=>$id
            ); 

        return view('contenedor/admin/proformas/form_editar_proforma',$arrayParametros);
    }
    public function form_guardar_editando_proforma(Request $request){
        // dd($id);
        $lista_empresa= DB::select('SELECT 
        e.id_empresa, 
        e.nombre_marca
        FROM pro.tempresa e;');

    $lista_proformas=DB::select('SELECT p.id_proforma, p.fecha_reg, p.nro_proforma,u.name, p.estado, e.nombre_marca
            FROM pro.tproforma p
            join pro.tempresa e on e.id_empresa=p.id_empresa
            join segu.users u on u.id=p.id_usuario_reg;');

        // para guardar editando eliminar proforma_detalle inicio
        // dd($request->id_proforma);
    
      

        DB::delete("delete from pro.tproforma_detalle
                    WHERE id_proforma_detalle=?",
                    [$request->id_proforma]);
        // para guardar editando eliminar proforma_detalle inicio

        // $lista_empresa_seleccionada= DB::select('SELECT 
        // e.id_empresa, 
        // e.nombre_marca
        // FROM pro.tempresa e
        // join pro.tproforma p on p.id_empresa=e.id_empresa where p.id_proforma=?',[$id]);

        // $estado_seleccionado= DB::select('SELECT estado
        //                     FROM pro.tproforma where id_proforma=?',[$id]);

        $query="with recursive tree as (
            select 
            vc.id_seccion_servicio,
            case when vc.nombre is null then pd.nombre_plataforma_digital else vc.nombre end as nombre,
            vc.descripcion,
            vc.id_padre,
            vc.id_seccion_servicio::text as orden,
            n.codigo_nivel,
            vc.precio,
            vc.cantidad_servicio
            from pro.seccion_servicio vc
            join pro.tnivel n on n.id_nivel=vc.id_nivel
            left join pro.tplataforma_digital pd on pd.id_plataforma_digital=vc.id_plataforma_digital
            where n.codigo_nivel='pla'
            union all

            select 
            vc.id_seccion_servicio,
            case when vc.nombre is null then pd.nombre_plataforma_digital else vc.nombre end as nombre,
            vc.descripcion,
            vc.id_padre,
            (t.orden || '->' || vc.id_seccion_servicio)::text as orden,
            n.codigo_nivel,
            vc.precio,
            vc.cantidad_servicio
            from pro.seccion_servicio vc
            join pro.tnivel n on n.id_nivel=vc.id_nivel
            --where n.codigo_nivel='pla'
            join tree t on t.id_seccion_servicio=vc.id_padre
            left join pro.tplataforma_digital pd on pd.id_plataforma_digital=vc.id_plataforma_digital
            where n.codigo_nivel not in ('fac','ins','whabus','tik','web')
            )
            select
            pdt.id_seccion_servicio,
            t.nombre ,t.descripcion,
            pd.nombre_plataforma_digital,
            pd.plataforma_digital_descripcion,
            t.codigo_nivel,
            pdt.precio_unitario as precio,
            pdt.cantidad_servicio,
            
            'pre_'||t.id_seccion_servicio as precio_get,
            'cant_'||t.id_seccion_servicio as cantidad_get,
            'check_'||t.id_seccion_servicio as check_get

           
            
            from tree t 
            left join pro.seccion_servicio s on s.id_seccion_servicio::varchar = (split_part(t.orden,'->',2))::varchar
            left join pro.tplataforma_digital pd on pd.id_plataforma_digital=s.id_plataforma_digital
            
            left join pro.tproforma_detalle pdt on pdt.id_seccion_servicio=t.id_seccion_servicio
            
            where t.codigo_nivel!='esp' 
            order by t.orden asc";

        $lista_servicios = DB::select($query);

        // actualizar proforma inicio
            $id_proforma=$request->id_proforma;
        
            
            //insertar el encabezado de proforma
            // dd($request->id_proforma);
            

            DB::update('UPDATE pro.tproforma SET 
            estado=?, 
            id_empresa=?, 
            fecha_mod=now()::TIMESTAMP,
            id_usuario_mod=?
            WHERE id_proforma=?',[$request->estado,$request->id_empresa,(int)Auth::id(),$request->id_proforma]);

            //actualizar proforma_detalle
            foreach ($lista_servicios as $p) {

                if($request->input($p->check_get)){
    
                    // $res.=$p->id_seccion_servicio.'->'.$request->input($p->precio_get).'->'.$request->input($p->cantidad_get).'->'.$request->input($p->precio_get) * $request->input($p->cantidad_get).'->'.$request->id_empresa.'->'.$request->fecha.'->'.$request->estado;
                    $this->InsertarProforma($id_proforma,$p->id_seccion_servicio,$request->input($p->precio_get),$request->input($p->cantidad_get),($request->input($p->precio_get) * $request->input($p->cantidad_get)));
    
                }
    
            }
        // actualizar proforma fin
        
        

        $arrayParametros = array(
            'lista_empresa' => $lista_empresa,
            'lista_servicios'=>$lista_servicios,
            // 'estado_seleccionado'=>$estado_seleccionado,
            // 'id_empresa'=>$lista_empresa_seleccionada[0]->id_empresa,

            'id_empresa'=>$request->id_empresa,
            'lista_proformas'=>$lista_proformas

            // 'id_seccion_servicio' =>$id_seccion_servicio,
            // 'precio_get' =>$precio,
            // 'cantidad_get' =>$cantidad_servicio,
            // 'check_get'=>$check_get

            ); 

        return view('contenedor.admin.proformas.proforma',$arrayParametros);
    }
}


