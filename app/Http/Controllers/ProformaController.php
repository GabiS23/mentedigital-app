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
        return view('contenedor.admin.proformas.form_nueva_proforma');
    }
}


