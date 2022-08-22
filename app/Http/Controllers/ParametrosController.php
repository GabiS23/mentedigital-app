<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ParametrosController extends Controller
{
    public function gestion()
    {
        $lista_gestion= DB::select("select id_gestion, nombre, fecha_reg, fecha_mod, usuario_mod
                                    FROM pro.tgestion;
                                    ");
        $arrayParametros = array(
        'lista_gestion' => $lista_gestion
                                );
        return view('contenedor.admin.parametros.gestion',$arrayParametros); 
    }
    public function marca(){
        $lista_marca=DB::select("select 
                            e.id_empresa,
                            e.nombre_marca, 
                            e.fecha_ingreso, 
                            e.rubro, 
                            e.telefono, 
                            e.celular, 
                            e.direccion, 
                            e.fecha_aniversario, 
                            e.ciudad, 
                            e.provincia, 
                            e.usuario_mod, 
                            e.fecha_reg, 
                            e.fecha_mod, 
                            p.nombre_pais,
                            u.name
                            from pro.tempresa e
                            join segu.users u on u.id=e.usuario_reg
                            join pro.tpais p on p.id_pais=e.id_pais
                                                ");

        $arrayParametros = array(
            'lista_marca' => $lista_marca
                                );
        return view('contenedor.admin.parametros.marca',$arrayParametros);
    }
    public function form_nueva_marca(){
        // dd('Hola nueva marca');
        return view('contenedor.admin.parametros.form_nueva_marca');
    }
    public function nueva_marca(){
        return view('contenedor.admin.parametros.nueva_marca');
    }
    public function clientes(){
        $lista_clientes=DB::select("select 
                                p.nombre,
                                p.apellido, 
                                p.ci,
                                p.expedido,
                                p.fecha_nacimiento,
                                p.genero,
                                p.direccion,
                                p.celular,
                                c.id_cliente, 
                                c.id_persona, 
                                c.fecha_reg, 
                                c.fecha_mod
                                FROM pro.tcliente c
                                join pro.tpersona p on p.id_persona=c.id_persona"
                                );

        $arrayParametros = array(
            'lista_clientes' => $lista_clientes
                                );
        return view('contenedor.admin.parametros.clientes',$arrayParametros);
    }
}