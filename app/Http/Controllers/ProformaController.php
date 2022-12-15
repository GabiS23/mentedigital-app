<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProformaController extends Controller
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
    public function proforma()
    {
        return view('contenedor.admin.proformas.proforma'); 
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
    public function form_proforma()
    {
        return view('contenedor.admin.proformas.form_proforma'); 
    }
}


