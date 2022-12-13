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
        order by nombre_marca ASC');

        $arrayParametros = array(
            'lista_empresa' => $lista_empresa
            ); 

        return view('contenedor.admin.proformas.form_nueva_proforma',$arrayParametros);
    }
    public function form_proforma()
    {
        return view('contenedor.admin.proformas.form_proforma'); 
    }
}


