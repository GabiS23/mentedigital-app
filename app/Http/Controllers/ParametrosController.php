<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ParametrosController extends Controller
{
    public function gestion(){
        $lista_gestion= DB::select("select id_gestion, nombre, fecha_reg, fecha_mod, usuario_mod
                                    FROM pro.tgestion;
                                    ");
        $arrayParametros = array(
        'lista_gestion' => $lista_gestion
                                );
        return view('contenedor.admin.parametros.gestion',$arrayParametros); 
    }
    public function marca(){

        $lista_marca=DB::select("select e.id_empresa, e.nombre_marca,u.name, e.fecha_reg from pro.tempresa e
        join segu.users u on u.id=e.usuario_reg");

        $arrayParametros = array(
            'lista_marca' => $lista_marca
                                );
        return view('contenedor.admin.parametros.marca',$arrayParametros);
    }
    public function form_nueva_marca(){

        $lista_empresa= DB::select('SELECT 
                                id_empresa, 
                                nombre_marca
                                FROM pro.tempresa;');
        $lista_errores=array();
        // dd('Hola nueva marca');
        $arrayParametros = array(
            'lista_empresa' => $lista_empresa,
            'lista_errores'=>$lista_errores,
            'validacion_correcta'=>0,
            'nombre_marca'=>""
        );
                                
        return view('contenedor.admin.parametros.form_nueva_marca',$arrayParametros);
    }

    public function validacion_marca(Request $request){

        $lista_errores = array();

        if($request->nombre_marca==""){
            array_push($lista_errores, "Debe escribir un nombre de marca");
        }
       
        $marca_duplicado=DB::select("select 
                                        COUNT(nombre_marca)as cantidad_marca
                                        from pro.tempresa
                                        where nombre_marca=?",
                                    [$request->nombre_marca]);
        if(($marca_duplicado[0]->cantidad_marca)>0){
            array_push($lista_errores, "Nombre de marca ya registrado");
            
        };
        
        // $usuario_logueado=DB::select("select count(*) as users from segu.users u where u.id=?",[auth()->id()]);
        // if(($usuario_logueado[0]->users)>0){
        //     array_push($lista_errores, "Usuario logueado");
        // };
        // dd(count($lista_errores));
        return $lista_errores;
    }
    public function nueva_marca(Request $request){
        $lista_marca=DB::select("select 
                            e.id_empresa,
                            e.nombre_marca
                            from pro.tempresa e
                            ");
        $lista_empresa= DB::select('SELECT 
                                id_empresa, 
                                nombre_marca
                                FROM pro.tempresa;');

        $lista_errores=$this->validacion_marca($request);
        // dd('Hola MAR');
        $validacion_correcta=count($lista_errores);

        if($validacion_correcta==0){
            DB::insert('INSERT INTO pro.tempresa(
                fecha_reg,nombre_marca)
                VALUES (now()::TIMESTAMP,?);',[$request->nombre_marca]);
            $arrayParametros = array(
                'lista_empresa' => $lista_empresa,
                'lista_marca' => $lista_marca,
                'nombre_marca'=>$request->nombre_marca,
                'lista_errores'=>$lista_errores,
                'validacion_correcta'=>1);
        }
        else{
            $arrayParametros=array(
                'lista_empresa' => $lista_empresa,
                'lista_marca' => $lista_marca,
                'nombre_marca'=>$request->nombre_marca,
                'lista_errores'=>$lista_errores,
                'validacion_correcta'=>0
            );
        }
            // dd($arrayParametros);
        return view('contenedor.admin.parametros.form_nueva_marca',$arrayParametros );
    }
    public function form_editar_marca($id){
        $lista_marca=DB::select("select 
                            e.id_empresa,
                            e.nombre_marca
                            from pro.tempresa e
                            ");
        $lista_empresa= DB::select('SELECT 
                                id_empresa, 
                                nombre_marca
                                FROM pro.tempresa;');

        $lista_errores=$this->validacion_marca($request);
        // dd('Hola MAR');
        $validacion_correcta=count($lista_errores);
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
