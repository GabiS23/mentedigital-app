<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;

class HuellaDigitalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){

        // $this->middleware('auth'); if si esta logeado 
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function huella_digital(){

        $lista_huella_digital=DB::select('select 
                                            hd.id_huella_digital, 
                                            hd.fecha_reg,
                                            hd.total_preguntas,
                                            hd.total_nulos,
                                            hd.chek_respuestas,
                                            hd.respuesta_porcentaje,
                                            hd.fecha_mod,  
                                            hd.nro_huella_digital, 
                                            hd.usuario_mod, 
                                            hd.id_empresa, 
                                            e.nombre_marca,
                                            e.rubro
                                            FROM pro.thuella_digital hd 
                                            join pro.tempresa e on e.id_empresa=hd.id_empresa
                                            order by hd.id_huella_digital desc');

        $arrayParametros = array(
            'lista_huella_digital' => $lista_huella_digital
            ); 
        return view('contenedor/admin/huella_digital/huella_digital',$arrayParametros);
    }
    public function form_nueva_huella(){

        $lista_empresa= DB::select('SELECT 
                                id_empresa, 
                                nombre_marca
                                FROM pro.tempresa;');

        $query="with recursive tree as (
            select 
            vc.id_nivel,
            vc.pregunta,
            vc.id_padre,
            vc.id_nivel::text as orden, 
            vc.titulo
            from pro.vcuestionario vc
            where vc.id_padre=5
            union all
            select 
            vc.id_nivel,
            vc.pregunta,
            vc.id_padre,
            (t.orden || '->' || vc.id_nivel)::text as orden,
            vc.titulo
            from pro.vcuestionario vc
            join tree t on t.id_nivel=vc.id_padre
            )
            select 
            t.id_nivel,
            t.pregunta,
            t.titulo
            from tree t
            order by t.orden asc";

        $lista_cuestionario=DB::select($query);
        
        $arrayParametros = array(
            'lista_cuestionario' => $lista_cuestionario,
            'lista_empresa' => $lista_empresa
            ); 

        return view('contenedor/admin/huella_digital/form_nueva_huella',$arrayParametros);
    }
    public function form_guardar_huella(Request $request){

        $lista_empresa= DB::select('SELECT 
                                id_empresa, 
                                nombre_marca
                                FROM pro.tempresa;');

        $query="with recursive tree as (
            select 
            vc.id_nivel,
            vc.pregunta,
            vc.id_padre,
            vc.id_nivel::text as orden, 
            vc.titulo
            from pro.vcuestionario vc
            where vc.id_padre=5
            union all
            select 
            vc.id_nivel,
            vc.pregunta,
            vc.id_padre,
            (t.orden || '->' || vc.id_nivel)::text as orden,
            vc.titulo
            from pro.vcuestionario vc
            join tree t on t.id_nivel=vc.id_padre
            )
            select 
            t.id_nivel,
            t.pregunta,
            t.titulo
            from tree t
            order by t.orden asc";

        $lista_cuestionario=DB::select($query);
        $res="";

        //insertar el encabezado 
        // dd($request->id_empresa);
        DB::insert('INSERT INTO pro.thuella_digital(
            fecha_reg, id_empresa)
           VALUES ( now()::TIMESTAMP, ?);',[$request->id_empresa]);

        $id_huella_digital=DB::select('select MAX(id_huella_digital) as id_huella_digital from pro.thuella_digital');
       
        // DB::insert('INSERT INTO pro.');
        foreach ($lista_cuestionario as $p){

            $id='pre_'.(string)$p->id_nivel;
            // dd($request->$id);
            if ($request->$id) {
                // dd($request->id_empresa);
                // $res.=$request->$id.'->';
                DB::insert('INSERT INTO pro.thuella_digital_respuesta(
                    id_huella_digital, id_seccion_servicio)
                   VALUES (?, ?);',[$id_huella_digital[0]->id_huella_digital,$request->$id]);
            }
        }
        $query_respuestas="with recursive tree as (
            select 
            vc.id_nivel,
            vc.pregunta,
            vc.id_padre,
            vc.id_nivel::text as orden, 
            vc.titulo
            from pro.vcuestionario vc
            where vc.id_padre=5
            union all
            select 
            vc.id_nivel,
            vc.pregunta,
            vc.id_padre,
            (t.orden || '->' || vc.id_nivel)::text as orden,
            vc.titulo
            from pro.vcuestionario vc
            join tree t on t.id_nivel=vc.id_padre
            ),
			respuestas as (
            select 
            t.id_nivel,
            t.pregunta,
            t.titulo,
			t.id_padre,
			--ss.valor,
			hdr.id_seccion_servicio
            from tree t
			left join pro.thuella_digital_respuesta hdr on hdr.id_seccion_servicio=t.id_nivel and hdr.id_huella_digital=?
			left join pro.seccion_servicio ss on ss.id_seccion_servicio=t.id_nivel
            order by t.orden asc),
			resultado as (
			select 
			r.id_nivel, 
			--r.valor,
			case when r.id_seccion_servicio is not null then 1 else 0 end as chek_respuestas ,
			case when r.id_seccion_servicio is null then 1 else 0 end as check_null
			from respuestas r 
			where r.titulo !='si')
			select 
			count(r.id_nivel) as total_preguntas ,
			sum(r.chek_respuestas) as chek_respuestas,
			sum(r.check_null) as total_nulos,
			(sum(r.check_null)*100)/count(r.id_nivel) as respuesta_porcentaje
			from resultado r";

        $lista_respuestas=DB::select($query_respuestas,[$id_huella_digital[0]->id_huella_digital]);

        DB::update('UPDATE pro.thuella_digital
            SET total_preguntas =?, 
            chek_respuestas=?,
            total_nulos=?,
            respuesta_porcentaje=?
            where id_huella_digital=?;',[$lista_respuestas[0]->total_preguntas,$lista_respuestas[0]->chek_respuestas,$lista_respuestas[0]->total_nulos,$lista_respuestas[0]->respuesta_porcentaje,$id_huella_digital[0]->id_huella_digital]);

        // dd($res);
        $arrayParametros = array(
            'lista_cuestionario' => $lista_cuestionario,
            'lista_empresa' => $lista_empresa
            ); 
        return view('contenedor/admin/huella_digital/form_nueva_huella',$arrayParametros);
        
    }
    public function form_editar_huella($id){
        // dd($id);
        $lista_empresa= DB::select('SELECT 
                                id_empresa, 
                                nombre_marca
                                FROM pro.tempresa;');
        // consulta de preguntas seleccionadas
        $query="WITH recursive tree as (
            select 
            vc.id_nivel,
            vc.pregunta,
            vc.id_padre,
            vc.id_nivel::text as orden, 
            vc.titulo
            from pro.vcuestionario vc
            where vc.id_padre=5
            union all
            select 
            vc.id_nivel,
            vc.pregunta,
            vc.id_padre,
            (t.orden || '->' || vc.id_nivel)::text as orden,
            vc.titulo
            from pro.vcuestionario vc
            join tree t on t.id_nivel=vc.id_padre)
            select 
            t.id_nivel,
            t.pregunta,
            t.titulo,
			hdr.id_seccion_servicio
            from tree t
			left join pro.thuella_digital_respuesta hdr on hdr.id_seccion_servicio=t.id_nivel and hdr.id_huella_digital=".$id."::integer
			left join pro.seccion_servicio ss on ss.id_seccion_servicio=t.id_nivel
            order by t.orden asc";

        $lista_cuestionario=DB::select($query);
        
        $arrayParametros = array(
            'lista_cuestionario' => $lista_cuestionario,
            'lista_empresa' => $lista_empresa,
            'id_huella_digital'=>$id
            ); 

        return view('contenedor/admin/huella_digital/form_editar_huella',$arrayParametros);
    }
    public function form_guardar_editando_huella(Request $request,$id){
        // dd($id);
        $lista_empresa= DB::select('SELECT 
                                id_empresa, 
                                nombre_marca
                                FROM pro.tempresa;');

        $query="WITH recursive tree as (
            select 
            vc.id_nivel,
            vc.pregunta,
            vc.id_padre,
            vc.id_nivel::text as orden, 
            vc.titulo
            from pro.vcuestionario vc
            where vc.id_padre=5
            union all
            select 
            vc.id_nivel,
            vc.pregunta,
            vc.id_padre,
            (t.orden || '->' || vc.id_nivel)::text as orden,
            vc.titulo
            from pro.vcuestionario vc
            join tree t on t.id_nivel=vc.id_padre
            )
            select 
            t.id_nivel,
            t.pregunta,
            t.titulo
            from tree t
            order by t.orden asc";

        $lista_cuestionario=DB::select($query);
        $res="";

        $id_huella_digital=DB::select('select MAX(id_huella_digital) as id_huella_digital from pro.thuella_digital');
        //insertar el encabezado 
        // dd($request->id_empresa);
        DB::update('UPDATE pro.thuella_digital
        SET   fecha_mod=now()::TIMESTAMP
        WHERE id_huella_digital=?',[$request->$id]);

        // DB::update('INSERT INTO pro.thuella_digital(
        //     fecha_reg, id_empresa)
        //    VALUES ( now()::TIMESTAMP, ?);',[$request->id_empresa]);

        // $id_huella_digital=DB::select('select MAX(id_huella_digital) as id_huella_digital from pro.thuella_digital');
    
        // DB::insert('INSERT INTO pro.');

        foreach ($lista_cuestionario as $p){

            $id_pre='pre_'.(string)$p->id_nivel;
            //  dd($id);
            if ($id_pre) {
                // dd($id_pre);
                //  dd($request->id_empresa);
                // $res.=$request->$id.'->';

                
                // DB::insert('INSERT INTO pro.thuella_digital_respuesta(
                //     id_huella_digital, id_seccion_servicio)
                //    VALUES (?, ?);',[$id_huella_digital[0]->id_huella_digital,$request->$id]);

                // editar preguntas checkeadas
                DB::UPDATE('UPDATE 
                            pro.thuella_digital_respuesta
                            SET id_seccion_servicio=?
                            WHERE id_huella_digital=?',
                            [$request->$id_pre,$request->$id]);
                }
        }
        
        $query_respuestas="WITH recursive tree as (
            select 
            vc.id_nivel,
            vc.pregunta,
            vc.id_padre,
            vc.id_nivel::text as orden, 
            vc.titulo
            from pro.vcuestionario vc
            where vc.id_padre=5
            union all
            select 
            vc.id_nivel,
            vc.pregunta,
            vc.id_padre,
            (t.orden || '->' || vc.id_nivel)::text as orden,
            vc.titulo
            from pro.vcuestionario vc
            join tree t on t.id_nivel=vc.id_padre
            ),
            respuestas as (
            select 
            t.id_nivel,
            t.pregunta,
            t.titulo,
            t.id_padre,
            --ss.valor,
            hdr.id_seccion_servicio
            from tree t
            left join pro.thuella_digital_respuesta hdr on hdr.id_seccion_servicio=t.id_nivel and hdr.id_huella_digital=?
            left join pro.seccion_servicio ss on ss.id_seccion_servicio=t.id_nivel
            order by t.orden asc),
            resultado as (
            select 
            r.id_nivel, 
            --r.valor,
            case when r.id_seccion_servicio is not null then 1 else 0 end as chek_respuestas ,
            case when r.id_seccion_servicio is null then 1 else 0 end as check_null
            from respuestas r 
            where r.titulo !='si')
            select 
            count(r.id_nivel) as total_preguntas ,
            sum(r.chek_respuestas) as chek_respuestas,
            sum(r.check_null) as total_nulos,
            (sum(r.check_null)*100)/count(r.id_nivel) as respuesta_porcentaje
            from resultado r";

        // $lista_respuestas=DB::select($query_respuestas,[$id_huella_digital[0]->id_huella_digital]);
        
        $lista_respuestas=DB::select($query_respuestas,[$id_huella_digital[0]->id_huella_digital]);

        DB::update('UPDATE pro.thuella_digital
            SET total_preguntas =?, 
            chek_respuestas=?,
            total_nulos=?,
            respuesta_porcentaje=?
            where id_huella_digital=?;',[$lista_respuestas[0]->total_preguntas,$lista_respuestas[0]->chek_respuestas,$lista_respuestas[0]->total_nulos,$lista_respuestas[0]->respuesta_porcentaje,$id_huella_digital[0]->id_huella_digital]);

        // dd($res);
        $arrayParametros = array(
            'lista_cuestionario' => $lista_cuestionario,
            'lista_empresa' => $lista_empresa 
            ); 
        return view('contenedor/admin/huella_digital/form_nueva_huella',$arrayParametros);
        
    }
    public function pdf_huella_digital($id){

        // dd($id);
        $huella_digital= DB::select('Select 
                                    id_huella_digital, 
                                    fecha_reg::DATE as fecha_registro, 
                                    nro_huella_digital, 
                                    usuario_mod, 
                                    id_empresa, 
                                    fecha_mod, 
                                    total_preguntas, 
                                    total_nulos, chek_respuestas, 
                                    respuesta_porcentaje 
                                    from pro.thuella_digital 
                                    where id_huella_digital=?',[$id]);

        $lista_empresa= DB::select('SELECT 
                                    id_empresa, 
                                    nombre_marca
                                    FROM pro.tempresa
                                    where id_empresa=?',[$huella_digital[0]->id_empresa]);
        
        // consulta de preguntas seleccionadas
        $query="WITH recursive tree as (
                            select 
                            vc.id_nivel,
                            vc.pregunta,
                            vc.id_padre,
                            vc.id_nivel::text as orden, 
                            vc.titulo
                            from pro.vcuestionario vc
                            where vc.id_padre=5
                            union all
                            select 
                            vc.id_nivel,
                            vc.pregunta,
                            vc.id_padre,
                            (t.orden || '->' || vc.id_nivel)::text as orden,
                            vc.titulo
                            from pro.vcuestionario vc
                            join tree t on t.id_nivel=vc.id_padre
                            )
                            select 
                            t.id_nivel,
                            t.pregunta,
                            t.titulo,
                            hdr.id_seccion_servicio
                            from tree t
                            left join pro.thuella_digital_respuesta hdr on hdr.id_seccion_servicio=t.id_nivel and hdr.id_huella_digital=".$id."::integer
                            left join pro.seccion_servicio ss on ss.id_seccion_servicio=t.id_nivel
        order by t.orden asc ";

        $lista_cuestionario=DB::select($query);

            // return compact('lista_cuestionario');
        
        $arrayParametros = array(
        'lista_empresa' => $lista_empresa,
        'huella_digital' => $huella_digital,
        'lista_cuestionario'=> $lista_cuestionario
        // 'id_huella_digital'=>$id
        ); 
        // dd($arrayParametros['lista_cuestionario']);

        view()->share('arrayParametros',$arrayParametros);
        $pdf = PDF::loadView('contenedor/admin/huella_digital/pdf_huella_digital');
                    
        return $pdf->download('huella_digital.pdf'); 

        
    }
}
