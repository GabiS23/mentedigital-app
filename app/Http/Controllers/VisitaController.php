<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class VisitaController extends Controller
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
    public function inicio_index()
    {
        return view('contenedor/visita/inicio');
    }
    public function brandingEstrategico_index()
    {
        return view('contenedor/visita/brandingEstrategico');
    }
    public function socialMedia_index()
    {
        return view('contenedor/visita/socialMedia');  
    }
    public function grafico_index()
    {
        return view('contenedor/visita/grafico');
    }
    public function tiktok_index()
    {
        return view('contenedor/visita/tiktok');
    }
    public function fotografia_index()
    {
        return view('contenedor/visita/fotografia');
    }
    public function audiovisual_index()
    {
        return view('contenedor/visita/audiovisual');
    }
    public function web_index()
    {
        return view('contenedor/visita/web');
    }
    public function nosotros_index()
    {
        return view('contenedor/visita/nosotros');
    }
    public function equipo_index()
    {
        return view('contenedor/visita/equipo');
    }
    // public function contacto_index()
    // {

    //     return view('contenedor/visita/contacto');  
    // }
    
}