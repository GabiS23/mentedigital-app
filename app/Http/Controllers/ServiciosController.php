<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ServiciosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function servicio_tree(Request $request){
        $query="with recursive tree as (
            select
            p.id_seccion_servicio,p.id_padre, p.nombre as text, 0 as nivel
            from pro.seccion_servicio p
            where p.id_padre is NULL
            union all
            select
            p1.id_seccion_servicio,p1.id_padre, p1.nombre as text, p.nivel+1 as nivel
            from pro.seccion_servicio p1
            join tree p on   p.id_seccion_servicio = p1.id_padre
            ),
            
            maximo_nivel as (
            select
            max(nivel) as nivel_maximo
            from tree ),
            
            menu as (
            select t.*,
            jsonb '[]' children
            from tree t
            join maximo_nivel mn on mn.nivel_maximo=t.nivel
            union
            (
            select (pri).*,
            jsonb_agg(seg)
            from (
            select pri,
                seg
            from tree pri
            inner join menu seg on seg.id_padre = pri.id_seccion_servicio
            ) branch
            group by branch.pri
            
            union

            select c.id_seccion_servicio,
            c.id_padre,
            c.text,
            c.nivel,
            jsonb '[]' children 
            from   tree c
            where  not  exists  (select 1 from tree pri where pri.id_padre = c.id_seccion_servicio)
            )
            )
            select jsonb_pretty(row_to_json( menu )::jsonb) ::text json_tree
            from menu
            where nivel = 0
            order by  nivel;";

        $lista_servicios= DB::select($query);
        
        $arrayParametros = array(
                                'lista_servicios' => $lista_servicios
                                );
            return $arrayParametros; 
        // return  $arrayParametros;
    }
    function servicio(){
        $query="with recursive tree as (
            select
            p.id_seccion_servicio,p.id_padre, p.nombre,p.descripcion,p.precio, 0 as nivel
			,p.id_seccion_servicio ::text as orden, p.id_nivel,p.id_plataforma_digital,p.valor
            from pro.seccion_servicio p
            where (p.id_padre is NULL or p.id_padre=0)
            union all
            select
            p1.id_seccion_servicio,p1.id_padre, p1.nombre,p1.descripcion,p1.precio, p.nivel+1 as nivel
			, (p.orden ||'->'|| p1.id_seccion_servicio)::text as orden, p1.id_nivel,p1.id_plataforma_digital,p1.valor
            from pro.seccion_servicio p1
            join tree p on   p.id_seccion_servicio = p1.id_padre
            )
			select 
			t.nivel,
			t.id_seccion_servicio,
			t.id_padre,
            case when t.nombre is null then pd.nombre_plataforma_digital else t.nombre end as nombre,
            t.descripcion,
            t.precio,
			t.orden,
            n.descripcion_nivel,
            t.valor
			from tree t
            left join pro.tnivel n on n.id_nivel=t.id_nivel
            left join pro.tplataforma_digital pd on pd.id_plataforma_digital=t.id_plataforma_digital 
			order by orden asc";

        $mensaje=array();
        // array_push($mensaje, "Rose");
        // array_push($mensaje, "Pupu");
        // dd($mensaje[0]);
        // dd(count($mensaje));

        $lista_servicios= DB::select($query);
        $arrayParametros = array(
            'lista_servicios' => $lista_servicios,
            'mensaje' => $mensaje
            );
        return view('contenedor.admin.servicios.servicio',$arrayParametros);
    }
    public function tabla_tree(Request $request){
        $query="with recursive tree as (
            select
            p.id_seccion_servicio,p.id_padre, p.nombre, 0 as nivel
			,p.id_seccion_servicio ::text as orden
            from pro.seccion_servicio p
            where p.id_padre is NULL
            union all
            select
            p1.id_seccion_servicio,p1.id_padre, p1.nombre, p.nivel+1 as nivel
			, (p.orden ||'->'|| p1.id_seccion_servicio)::text as orden
            from pro.seccion_servicio p1
            join tree p on   p.id_seccion_servicio = p1.id_padre
            )
			select 
			case when t.nivel=1 then 
			'<tr data-node-id='||''''||t.id_seccion_servicio||'''>'||'<td>'||t.nombre||'</td>'||'</tr>'
			else 
			'<tr data-node-id='''||t.id_seccion_servicio||'''data-node-pid='''||t.id_padre||'''>'||'<td>'||t.nombre||'</td>'||'</tr>'
			end as  gabi
			from tree t
			where t.nivel !=0
			order by orden asc";

        $lista_servicios= DB::select($query);
    
        $arrayParametros = array(
                            'lista_servicios' => $lista_servicios
                            );
        return $arrayParametros; 
    }
    public function form_nuevo($id){
                                          
        $id_nivel_siguiente=DB::select('select 
                                    s.id_seccion_servicio,
                                    n2.id_nivel,
                                    n2.descripcion_nivel,
                                    n2.codigo_nivel
                                    FROM pro.seccion_servicio s
                                    join pro.tnivel n on n.id_nivel=s.id_nivel
                                    join pro.tnivel n2 on n2.id_padre=n.id_nivel
                                    where s.id_seccion_servicio=?',[$id]);
        //  dd($id_nivel_siguiente);
        if ($id==0) {
            # code...
            $lista_nivel= DB::select('select n.id_nivel, n.descripcion_nivel
            FROM pro.tnivel n;');
        }
        else{
            $lista_nivel= DB::select('select 
            n.id_nivel, 
            n.descripcion_nivel
            FROM pro.tnivel n
            where n.id_nivel in (select 
                                n2.id_nivel
                                FROM pro.seccion_servicio s
                                join pro.tnivel n on n.id_nivel=s.id_nivel
                                join pro.tnivel n2 on n2.id_padre=n.id_nivel
                                where s.id_seccion_servicio=?
            );',[$id]);
        }
        if ($id_nivel_siguiente) {
            # code...
            $lista_plataforma_digital=DB::select('select 
            P.id_plataforma_digital,
            p.nombre_plataforma_digital, 
            n.descripcion_nivel,
            n.id_nivel
            from pro.tplataforma_digital p
            left join pro.tnivel n on n.id_nivel = p.id_nivel
            where n.id_nivel=?',[$id_nivel_siguiente[0]->id_nivel]);
        }
        else{
            $lista_plataforma_digital=[];
        }
       
        // dd($id_nivel_siguiente);

        if ($id_nivel_siguiente) {

            $id_nivel = $id_nivel_siguiente[0]->id_nivel;
            $codigo_nivel = $id_nivel_siguiente[0]->codigo_nivel;
        }
        else{
            $raiz= DB::select('select 
            n.id_nivel, 
            n.descripcion_nivel
            FROM pro.tnivel n
            where n.codigo_nivel=?;',["raiz"]);

            $id_nivel = $raiz[0]->id_nivel;
            $codigo_nivel = "";
        }
        // if (!$id_nivel_siguiente) {
        //     return redirect('/servicio');

        // }
        // dd($id_nivel_siguiente);
        // if ($id_nivel_siguiente[0]->codigo_nivel=='ser') {
           
        
        // dd($id_nivel_siguiente[0]->id_nivel);                        
        $arrayParametros = array(
            'id_padre' => $id,
            'lista_nivel' =>$lista_nivel,
            'id_nivel_siguiente'=>$id_nivel,
            'lista_plataforma_digital'=>$lista_plataforma_digital,
            'codigo_nivel' =>$codigo_nivel,
            'id_plataforma_digital' =>0
            );

        return view('contenedor.admin.servicios.form_nuevo',$arrayParametros);
    }
    public function nuevo_servicio(Request $request,$id ){

        
        // dd($request->id_padre);
        // dd($request->nombre,$request->descripcion,$request->precio);
        $id_nivel_siguiente=DB::select('select 
                                    s.id_seccion_servicio,
                                    n2.id_nivel,
                                    n2.descripcion_nivel,
                                    n2.codigo_nivel
                                    FROM pro.seccion_servicio s
                                    join pro.tnivel n on n.id_nivel=s.id_nivel
                                    join pro.tnivel n2 on n2.id_padre=n.id_nivel
                                    where s.id_seccion_servicio=?',[$id]);

        if ($id==0) {
            # code...
            $lista_nivel= DB::select('select n.id_nivel, n.descripcion_nivel
            FROM pro.tnivel n;');
        }
        else{
            $lista_nivel= DB::select('select 
            n.id_nivel, 
            n.descripcion_nivel
            FROM pro.tnivel n
            where n.id_nivel in (select 
                                n2.id_nivel
                                FROM pro.seccion_servicio s
                                join pro.tnivel n on n.id_nivel=s.id_nivel
                                join pro.tnivel n2 on n2.id_padre=n.id_nivel
                                where s.id_seccion_servicio=?
            );',[$id]);
        }
        if ($id_nivel_siguiente) {
            # code...
            $lista_plataforma_digital=DB::select('select 
            P.id_plataforma_digital,
            p.nombre_plataforma_digital, 
            n.descripcion_nivel,
            n.id_nivel
            from pro.tplataforma_digital p
            left join pro.tnivel n on n.id_nivel = p.id_nivel
            where n.id_nivel=?',[$id_nivel_siguiente[0]->id_nivel]);
        }
        else{
            $lista_plataforma_digital=[];
        }

        if ($id_nivel_siguiente) {

            $id_nivel = $id_nivel_siguiente[0]->id_nivel;
            $codigo_nivel = $id_nivel_siguiente[0]->codigo_nivel;
        }
        else{
            $raiz= DB::select('select 
            n.id_nivel, 
            n.descripcion_nivel
            FROM pro.tnivel n
            where n.codigo_nivel=?;',["raiz"]);

            $id_nivel = $raiz[0]->id_nivel;
            $codigo_nivel = "";
        }

        DB::insert('INSERT INTO pro.seccion_servicio(
            nombre, 
            descripcion, 
            precio, 
            id_padre,
            id_nivel,
            id_gestion,
            id_plataforma_digital
            )   
            VALUES ( ?, ?, ?, ?,?,1,?);'
            ,[$request->nombre,$request->descripcion,$request->precio,$request->id_padre,$request->id_nivel_siguiente,$request->id_plataforma_digital]);

            $arrayParametros = array(
                'id_padre' => $request->id_padre,
                'lista_nivel' =>$lista_nivel,
                // 'id_nivel_siguiente'=>$id_nivel[0]->id_nivel,
                'id_nivel_siguiente'=>$id_nivel,
                'codigo_nivel' =>$codigo_nivel,
                // 'codigo_nivel' =>$id_nivel_siguiente[0]->codigo_nivel,
                'lista_plataforma_digital'=>$lista_plataforma_digital,
                'id_plataforma_digital'=>$request->id_plataforma_digital
                );


        return view('contenedor.admin.servicios.form_nuevo',$arrayParametros);
    }
    public function eliminar_servicio($id ){
        // dd($request->id_padre);
        // dd($request->nombre,$request->descripcion,$request->precio);
        DB::delete('delete from pro.seccion_servicio where id_seccion_servicio=?'
            ,[$id]);
           
            $mensaje=Array();
            $query="with recursive tree as (
                select
                p.id_seccion_servicio,p.id_padre, p.nombre,p.descripcion,p.precio, 0 as nivel
                ,p.id_seccion_servicio ::text as orden, p.id_nivel
                from pro.seccion_servicio p
                where p.id_padre is NULL or p.id_padre=0
                union all
                select
                p1.id_seccion_servicio,p1.id_padre, p1.nombre,p1.descripcion,p1.precio, p.nivel+1 as nivel
                , (p.orden ||'->'|| p1.id_seccion_servicio)::text as orden, p1.id_nivel
                from pro.seccion_servicio p1
                join tree p on   p.id_seccion_servicio = p1.id_padre
                )
                select 
                t.nivel,
                t.id_seccion_servicio,
                t.id_padre,
                t.nombre,
                t.descripcion,
                n.descripcion_nivel,
                t.precio,
                t.orden
                from tree t
                left join pro.tnivel n on n.id_nivel=t.id_nivel
                order by orden asc";
    
            $lista_servicios= DB::select($query);
            $arrayParametros = array(
                'lista_servicios' => $lista_servicios,
                'mensaje' => $mensaje
                );
            return view('contenedor.admin.servicios.servicio',$arrayParametros);
    }

    public function form_editar($id){
        //dibujar el formulario 
        // dd($request->id_padre);
        // dd($request->nombre,$request->descripcion,$request->precio);
        $servicios= DB::select('SELECT 
                                s.id_seccion_servicio, 
                                s.nombre, 
                                s.descripcion, 
                                s.precio, 
                                s.id_nivel, 
                                s.id_padre, 
                                s.id_gestion,
                                pd.id_plataforma_digital,
                                n.codigo_nivel
                                FROM pro.seccion_servicio s
                                left join pro.tplataforma_digital pd on pd.id_plataforma_digital=s.id_plataforma_digital
                                left join pro.tnivel n on n.id_nivel=s.id_nivel
                                where id_seccion_servicio=?;',[$id]);

        // $lista_nivel= DB::select('SELECT n.id_nivel, n.descripcion_nivel
        // FROM pro.tnivel n;');
       // dd($servicios[0]->id_padre);

        $lista_nivel= DB::select('select 
        n.id_nivel, 
        n.descripcion_nivel
        FROM pro.tnivel n
        where n.id_nivel in (select 
                            n2.id_nivel
                            FROM pro.seccion_servicio s
                            join pro.tnivel n on n.id_nivel=s.id_nivel
                            join pro.tnivel n2 on n2.id_padre=n.id_nivel
                            where s.id_seccion_servicio=?
        );',[$servicios[0]->id_padre]);
    

        // dd('hola',$servicios[0]->id_plataforma_digital);

        // dd($servicios);
        if ($servicios[0]->id_nivel) {
            # code...
            $lista_plataforma_digital=DB::select('select 
            P.id_plataforma_digital,
            p.nombre_plataforma_digital, 
            n.descripcion_nivel,
            n.id_nivel
            from pro.tplataforma_digital p
            left join pro.tnivel n on n.id_nivel = p.id_nivel
            where n.id_nivel=?',[$servicios[0]->id_nivel]);
        }
        else{
            $lista_plataforma_digital=[];
        }

            $arrayParametros = array(
                'id_padre' => $servicios[0]->id_padre,
                'id_seccion_servicio' =>$id,
                'nombre'=> $servicios[0]->nombre,
                'descripcion' => $servicios[0]->descripcion,
                'precio' => $servicios[0]->precio,

                'lista_nivel' =>$lista_nivel,
                'id_nivel'=>$servicios[0]->id_nivel,
                // lista plataforma digital
                'lista_plataforma_digital'=>$lista_plataforma_digital,
                'id_plataforma_digital'=>$servicios[0]->id_plataforma_digital,
                'codigo_nivel' =>$servicios[0]->codigo_nivel,
                );

        return view('contenedor.admin.servicios.form_editar',$arrayParametros);
    }

    public function editar_servicio(Request $request , $id){
        //
        $servicios= DB::select('SELECT 
                                s.id_seccion_servicio, 
                                s.nombre, 
                                s.descripcion, 
                                s.precio, 
                                s.id_nivel, 
                                s.id_padre, 
                                s.id_gestion,
                                pd.id_plataforma_digital,
                                n.codigo_nivel
                                FROM pro.seccion_servicio s
                                left join pro.tplataforma_digital pd on pd.id_plataforma_digital=s.id_plataforma_digital
                                left join pro.tnivel n on n.id_nivel=s.id_nivel
                                where id_seccion_servicio=?;',[$id]);

       
        
        // $servicios= DB::select('SELECT id_seccion_servicio, nombre, descripcion, precio, id_nivel, id_padre, id_gestion
        // FROM pro.seccion_servicio where id_seccion_servicio=?;',[$id]);

        // $lista_nivel= DB::select('SELECT n.id_nivel, n.descripcion_nivel
        // FROM pro.tnivel n;');
        
        $lista_nivel= DB::select('select 
        n.id_nivel, 
        n.descripcion_nivel
        FROM pro.tnivel n
        where n.id_nivel in (select 
                            n2.id_nivel
                            FROM pro.seccion_servicio s
                            join pro.tnivel n on n.id_nivel=s.id_nivel
                            join pro.tnivel n2 on n2.id_padre=n.id_nivel
                            where s.id_seccion_servicio=?
        );',[$servicios[0]->id_padre]);
       
        if ($servicios[0]->id_nivel) {
                    # code...
                    $lista_plataforma_digital=DB::select('select 
                    P.id_plataforma_digital,
                    p.nombre_plataforma_digital, 
                    n.descripcion_nivel,
                    n.id_nivel
                    from pro.tplataforma_digital p
                    left join pro.tnivel n on n.id_nivel = p.id_nivel
                    where n.id_nivel=?',[$servicios[0]->id_nivel]);
                }
                else{
                    $lista_plataforma_digital=[];
                }
        
        DB::update('UPDATE pro.seccion_servicio
                SET nombre=?, descripcion=?, precio=?, id_padre=?,id_nivel=?,id_gestion=?,id_plataforma_digital=?
                WHERE id_seccion_servicio=?;',[$request->nombre,$request->descripcion,$request->precio,$request->id_padre,$request->id_nivel,1,$request->id_plataforma_digital,$id]);

        $arrayParametros = array(
            'id_padre' => $request->id_padre,
            'id_seccion_servicio' =>$id,
            'nombre'=> $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,

            'lista_nivel' =>$lista_nivel,
            'id_nivel'=>$request->id_nivel,

            // lista plataforma digital
            'lista_plataforma_digital'=>$lista_plataforma_digital,
            'id_plataforma_digital'=>$request->id_plataforma_digital,
            'codigo_nivel' =>$servicios[0]->codigo_nivel
            );

        return view('contenedor.admin.servicios.form_editar',$arrayParametros);
    }
}