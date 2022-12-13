<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SeguridadController extends Controller
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
    public function usuarios()
    {
        $lista_usuarios= DB::select("select u.id, u.name, u.email,r.nombre_rol, u.created_at, u.updated_at
                                    FROM segu.users u
                                    join segu.trol r on r.id_rol=u.id_rol
                                    ");
        $arrayParametros = array(
        'lista_usuarios' => $lista_usuarios
                                );
        return view('contenedor.admin.seguridad.usuarios',$arrayParametros);
    }
    public function roles()
    {
        $lista_rol= DB::select("select id_rol, nombre_rol
                                    FROM segu.trol;
                                    ");
        $arrayParametros = array(
        'lista_rol' => $lista_rol
                                );
        return view('contenedor.admin.seguridad.roles',$arrayParametros);
    }



    public function form_nuevo_usuario(Request $request){
       
        $lista_rol=DB::select("select id_rol, nombre_rol from segu.trol;");
        $lista_errores=array();
        $arrayParametros = array(
                                
                                'lista_rol'=>$lista_rol,
                                'name'=>"",
                                'email'=>"",
                                'password'=>"",
                                'password_repeat'=>"",
                                'id_rol'=>0,
                                'lista_errores'=>$lista_errores,
                                'validacion_correcta'=>0
                            );
        return view('contenedor/admin/seguridad/form_nuevo_usuario',$arrayParametros);
    }
    public function validacion_usuario(Request $request){
        $lista_errores = array();
        if($request->name==""){
            array_push($lista_errores, "Debe escribir un nombre de usuario");
        }
        if($request->password==""){
            array_push($lista_errores, "Debe escribir una contraseña");
        }
        if($request->password_repeat==""){
            array_push($lista_errores, "Debe repetir la contraseña");
        }
        if($request->password!=$request->password_repeat){
            array_push($lista_errores,"Las contraseñas no coinciden");
        }
        if($request->email==""){
            array_push($lista_errores, "Debe escribir el email");
        }
        if($request->id_rol==0){
            array_push($lista_errores, "Debe seleccionar un rol");
        }
        
        $usuario_duplicado=DB::select("select 
                                        COUNT(name)as cantidad_usuario
                                        from segu.users
                                        where name=?",
                                    [$request->name]);
        if(($usuario_duplicado[0]->cantidad_usuario)>0){
            array_push($lista_errores, "Nombre de usuario ya registrado");
            
        };
        $email_duplicado=DB::select("select 
                                        COUNT(email)as cantidad_email
                                        from segu.users
                                        where email=?",
                                    [$request->email]);
        if(($email_duplicado[0]->cantidad_email)>0){
            array_push($lista_errores, "Email ya registrado");
            
        };
        // $usuario_logueado=DB::select("select count(*) as users from segu.users u where u.id=?",[auth()->id()]);
        // if(($usuario_logueado[0]->users)>0){
        //     array_push($lista_errores, "Usuario logueado");
        // };
        // dd(count($lista_errores));
        return $lista_errores;
    }
    public function guardar_usuario(Request $request){
       // dd(auth()->id());
       //1 validar campos vacios  20 
       //2 segun validacion insertar 30
       //3 recuperar el id del ultimo usuario insertado 20
       //4 con el ultimo id de usuario obtenido registrar en la tabla usuario sucursal 120
       //5 usar alertas de validacion en html correctamente 20
        $lista_rol=DB::select("select id_rol, nombre_rol from segu.trol;");
        
        $lista_errores=$this->validacion_usuario($request);
        $validacion_correcta=count($lista_errores);
        if($validacion_correcta==0){
            DB::insert("insert into segu.users (name,password,email,created_at,id_rol)values(?,?,?,now()::timestamp,?)",
                        [$request->name,$request->password,$request->email,$request->id_rol]);
            $id_ultimo_usuario=DB::select("select MAX(id) as id_usuario from segu.users");
            // $this->insertar_usuario_sucursal($id_ultimo_usuario[0]->id_usuario,$request->id_sucursal);
            // dd($id_ultimo_usuario[0]->id_usuario);
            //insert
            $arrayParametros=array(
                'lista_rol'=>$lista_rol,
                'lista_errores'=>$lista_errores,
                // 'lista_sucursal'=>$lista_sucursal,
                'validacion_correcta'=>1,
                'id_rol'=>0,
                // 'id_sucursal'=>array(),
                'name'=>"",
                'password'=>"",
                'password_repeat'=>"",
                'email'=>""
            );
        }
        else{
            //  dd(array($request->id_sucursal));
            $arrayParametros=array(
                'lista_rol'=>$lista_rol,
                'lista_errores'=>$lista_errores,
                // 'lista_sucursal'=>$lista_sucursal,
                'validacion_correcta'=>0,
                'id_rol'=>$request->id_rol,
                // 'id_sucursal'=>array($request->id_sucursal)[0],
                'name'=>$request->name,
                'password'=>$request->password,
                'password_repeat'=>$request->password_repeat,
                'email'=>$request->email
            );
        }
        
        // dd($request->id_sucursal);
        return view('contenedor/admin/seguridad/form_nuevo_usuario',$arrayParametros);
    }
    //foreach cuando es una lista de objetos 
    // public function insertar_usuario_sucursal($id_usuario,$lista_sucursal){
    //     for($i=0;$i < count($lista_sucursal);$i++){
    //         DB::insert("insert into pro.tusuario_sucursal (id_usuario,id_sucursal) values(?,?)",
    //                    [$id_usuario,$lista_sucursal[$i]]);
    //     }
    // }
    public function eliminar_usuario(Request $request){
        //el dd no funciona en ajax
        // return ($request->dato["id_producto"]);
        $cantidad_usuario=DB::select("select 
                                        count(*) as cantidad_proformas 
                                        from pro.tproforma pf
                                        join pro.tproducto pd on pd.id_producto=pf.id_producto
                                        where pd.id_usuario=?",
                                        [$request->dato["id_usuario"]]);

        $cantidad_usuarios=DB::select("select 
                                        count(*) as cantidad_productos 
                                        from pro.tproducto p 
                                        where p.id_usuario=?",
                                        [$request->dato["id_usuario"]]);
                                        
        if(($cantidad_usuario[0]->cantidad_proformas)>0 ){
            return "Error!! El usuario tiene proformas generadas!";
        }
        else{
            if(($cantidad_usuarios[0]->cantidad_productos)>0){
                return "Error!! El usuario tiene productos registrados!";
            }else{
                DB::delete("delete from segu.users
                    where id=?;",
                    [$request->dato["id_usuario"]]);
            }
        }
        return "";
    }
    public function form_editar_usuario($id){
        // dd('Hola gabi');
        $lista_rol=DB::select("select id_rol, nombre_rol from segu.trol;");
        
        $usuario_seleccionado=DB::select("select u.name, u.email, u,id_rol from segu.users u
                                        where id=?",[$id]);
        
        $lista_errores=array();
        $validacion_correcta=0;
        
        //  dd($usuario_sucursal[]);
        $arrayParametros=array(
                            'lista_rol'=>$lista_rol,
                            // 'lista_sucursal'=>$lista_sucursal,
                            'name'=>$usuario_seleccionado[0]->name,
                            'email'=>$usuario_seleccionado[0]->email,
                            'id_rol'=>$usuario_seleccionado[0]->id_rol,
                            'id_usuario'=>$id,
                            // 'sucursales_seleccionados'=>$lista_sucursales_seleccionados,
                            'lista_errores'=>$lista_errores,
                            'validacion_correcta'=>$validacion_correcta
                        );
        return view('contenedor/admin/seguridad/form_editar_usuario',$arrayParametros);
    }
    public function editar_usuario(Request $request){
        //Request $request ES cuando viene de un post
        // $lista_sucursal=DB::select("select s.id_sucursal, s.nombre_sucursal from pro.tsucursal s");
        $lista_rol=DB::select("select id_rol, nombre_rol from segu.trol;");
        //llamar a un metodo en php
        $lista_errores=$this->validar_errores_editando($request);
        $validacion_correcta=0;

        if(count($lista_errores)==0){
            $validacion_correcta=1;

            if($request->password==""){
                DB::update("UPDATE segu.users
                                SET name=?, email=?, updated_at=now()::timestamp, id_rol=?
                                WHERE id=?",[$request->name,$request->email,$request->id_rol,$request->id_usuario]);
            }else{
                DB::update("UPDATE segu.users
                SET name=?, email=?, password=?, updated_at=now()::timestamp, id_rol=?
                WHERE id=?",[$request->name,$request->email,Hash::make($request->password),$request->id_rol,$request->id_usuario]);
            }
            // DB::delete("DELETE FROM pro.tusuario_sucursal 
            //             WHERE id_usuario=?",[$request->id_usuario]);
            // $this->insertar_usuario_sucursal($request->id_usuario,$request->id_sucursal);

        }
        
        // dd($request->id_sucursal);
        $arrayParametros=array(
                            'lista_errores'=>$lista_errores,
                            'validacion_correcta'=>$validacion_correcta,
                            'name'=>$request->name,
                            'password'=>$request->password,
                            'password_repeat'=>$request->password_repeat,
                            'email'=>$request->email,
                            'lista_rol'=>$lista_rol,
                            // 'lista_sucursal'=>$lista_sucursal,
                            'id_rol'=>$request->id_rol,
                            // 'id_sucursal'=>$request->id_sucursal,
                            'id_usuario'=>$request->id_usuario,
                            // 'sucursales_seleccionados'=>$request->id_sucursal
        );
       
        return view('contenedor/admin/seguridad/form_editar_usuario',$arrayParametros);
    }
    public function validar_errores_editando($request){
        $lista_errores = array();
        if($request->name==""){
            array_push($lista_errores, "Debe escribir un nombre de usuario");
        }
        if($request->password!=""){
            if($request->password!=$request->password_repeat){
                array_push($lista_errores,"Las contraseñas no coinciden");
            }
        }
        
        if($request->email==""){
            array_push($lista_errores, "Debe escribir el email");
        }
        if($request->id_rol==0){
            array_push($lista_errores, "Debe seleccionar un rol");
        }
        // if($request->id_sucursal==0){
        //     array_push($lista_errores, "Debe seleccionar al menos una sucursal");
            
        // }
        $usuario_duplicado=DB::select("select 
                                        COUNT(name)as cantidad_usuario
                                        from segu.users
                                        where name=? and id !=?",
                                    [$request->name,$request->id_usuario]);
        if(($usuario_duplicado[0]->cantidad_usuario)>0){
            array_push($lista_errores, "Nombre de usuario ya registrado");
            
        };
        $email_duplicado=DB::select("select 
                                        COUNT(email)as cantidad_email
                                        from segu.users
                                        where email=? and id !=?",
                                    [$request->email,$request->id_usuario]);
        if(($email_duplicado[0]->cantidad_email)>0){
            array_push($lista_errores, "Email ya registrado");
            
        };
        // $usuario_logueado=DB::select("select count(*) as users from segu.users u where u.id=?",[auth()->id()]);
        // if(($usuario_logueado[0]->users)>0){
        //     array_push($lista_errores, "Usuario logueado");
        // };
        // dd(count($lista_errores));
        return $lista_errores;
    }
    public function gestion_index(){
        // $lista_errores=$this->validaciones($request);
        $lista_gestion= DB::select("SELECT g.id_gestion, g.nombre_gestion
                                    FROM pro.tgestion g");
        $arrayParametros = array(
                        'lista_gestion' => $lista_gestion
                        
                       );
        return view('contenedor/admin/seguridad/parametros/gestion',$arrayParametros);
    }
    public function marca_index(){
        $lista_marca=DB::select("SELECT m.id_marca, m.nombre_marca
        FROM pro.tmarca m");
        $arrayParametros = array(
            'lista_marca' => $lista_marca
           );
        return view('contenedor/admin/seguridad/parametros/marca',$arrayParametros);
    }
    public function categoria_index(){
        $lista_categoria=DB::select("select c.id_categoria,c.nombre_categoria from pro.tcategoria c");
        $arrayParametros = array(
            'lista_categoria' => $lista_categoria
           );
        return view('contenedor/admin/seguridad/parametros/categoria',$arrayParametros);
    }
    public function departamento_index(){
        $lista_departamento=DB::select("select d.id_departamento,d.nombre_departamento from pro.tdepartamento d");
        $arrayParametros = array(
            'lista_departamento' => $lista_departamento
           );
        return view('contenedor/admin/seguridad/parametros/departamento',$arrayParametros);
    }
    
    public function validaciones(Request $request){
        $lista_errores = array();
        if($request->nombre_gestion==""){
            array_push($lista_errores, "Debe introducir el nombre de usuario");
        }
        $gestion_duplicado=DB::select("select 
                                        COUNT(nombre_gestion)as cantidad_gestion
                                        from pro.tgestion
                                        where nombre_gestion=?",
                                    [$request->nombre_gestion]);
        if(($gestion_duplicado[0]->cantidad_gestion)>0){
            array_push($lista_errores, "Gestion ya registrada");
            
        };
        return $lista_errores;
    }
    
}