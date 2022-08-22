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
    
}