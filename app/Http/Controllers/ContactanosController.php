<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ContactanosController extends Controller
{
    public function index()
    {
        return view('contenedor.visita.contactanos.index'); 
    }
}
