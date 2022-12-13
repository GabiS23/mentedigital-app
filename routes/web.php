<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitaController;
use App\Http\Controllers\ContactanosController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LogOutController;

use App\Http\Controllers\ProformaController;
use App\Http\Controllers\SeguridadController;
use App\Http\Controllers\ParametrosController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\HuellaDigitalController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('contenedor/visita/inicio');
});
Route::get("/login", [LoginController::class, "login"])->name('login');
Route::post("/iniciar_sesion", [LoginController::class, "iniciar_sesion"])->name('iniciar_sesion');
Route::post("/cerrar_sesion", [LogOutController::class, "cerrar_sesion"])->name('cerrar_sesion');


Route::get("inicio_index", [VisitaController::class, "inicio_index"])->name('inicio_index');
Route::get("brandingEstrategico_index", [VisitaController::class, "brandingEstrategico_index"])->name('brandingEstrategico_index');
Route::get("socialMedia_index", [VisitaController::class, "socialMedia_index"])->name('socialMedia_index');
Route::get("grafico_index", [VisitaController::class, "grafico_index"])->name('grafico_index');
Route::get("tiktok_index", [VisitaController::class, "tiktok_index"])->name('tiktok_index');
Route::get("fotografia_index", [VisitaController::class, "fotografia_index"])->name('fotografia_index');
Route::get("audiovisual_index", [VisitaController::class, "audiovisual_index"])->name('audiovisual_index');
Route::get("web_index", [VisitaController::class, "web_index"])->name('web_index');
Route::get("nosotros_index", [VisitaController::class, "nosotros_index"])->name('nosotros_index');
Route::get("equipo_index", [VisitaController::class, "equipo_index"])->name('equipo_index');

Route::get('contactanos', [ContactanosController::class, 'index'])->name('contactanos.index');
Route::post('nuevo_cliente', [ContactanosController::class, 'nuevo_cliente'])->name('nuevo_cliente');

// Proformas
Route::get("proforma", [ProformaController::class, "proforma"])->name('proforma');
Route::get("form_nueva_proforma", [ProformaController::class, "form_nueva_proforma"])->name('form_nueva_proforma');
Route::post("nueva_proforma", [ProformaController::class, "nueva_proforma"])->name('nueva_proforma');

Route::get("eliminar_proforma/{id}", [ProformaController::class, "eliminar_proforma"])->name('eliminar_proforma');

Route::get("form_editar/{id", [ProformaController::class, "form_editar"])->name('form_editar');
Route::post("editar_proforma/{id}", [ProformaController::class, "editar_proforma"])->name('editar_proforma');

// Seguridad
Route::get("roles", [SeguridadController::class, "roles"])->name('roles');
Route::get("usuarios", [SeguridadController::class, "usuarios"])->name('usuarios');

Route::get("form_nuevo_usuario", [SeguridadController::class, "form_nuevo_usuario"])->name('form_nuevo_usuario');
Route::post("guardar_usuario", [SeguridadController::class, "guardar_usuario"])->name('guardar_usuario');

Route::post("/eliminar_usuario", [SeguridadController::class, "eliminar_usuario"])->name('eliminar_usuario');

Route::get("/form_editar_usuario/{id}", [SeguridadController::class, "form_editar_usuario"])->name('form_editar_usuario');
Route::post("/editar_usuario", [SeguridadController::class, "editar_usuario"])->name('editar_usuario');


// Admin
Route::get("inicioAdmin", [AdminController::class, "inicioAdmin"])->name('inicioAdmin');

////////////// configuracion ///////////////
Route::get("gestion", [ParametrosController::class, "gestion"])->name('gestion');
Route::get("clientes", [ParametrosController::class, "clientes"])->name('clientes');
// Marca
Route::get("marca", [ParametrosController::class, "marca"])->name('marca');
Route::get("form_nueva_marca", [ParametrosController::class, "form_nueva_marca"])->name('form_nueva_marca');
Route::post("nueva_marca", [ParametrosController::class, "nueva_marca"])->name('nueva_marca');

Route::get("eliminar_marca/{id}", [ParametrosController::class, "eliminar_marca"])->name('eliminar_marca');

Route::get("form_editar_marca/{id}", [ProformaController::class, "form_editar_marca"])->name('form_editar_marca');
Route::post("editar_marca/{id}", [ProformaController::class, "editar_marca"])->name('editar_marca');

// Select proforma
// Route::get("selectPlan/{id}", [ProformaController::class, "selectPlan"])->name('selectPlan');
Route::get("selectEspecialidad/{id}", [ProformaController::class, "selectEspecialidad"])->name('selectEspecialidad');
Route::get("getServicios", [ProformaController::class, "getServicios"])->name('getServicios');

// Servicios
Route::get("servicio", [ServiciosController::class, "servicio"])->name('servicio');
Route::get("servicio_tree", [ServiciosController::class, "servicio_tree"])->name('servicio_tree');
Route::get("tabla_tree", [ProformaController::class, "tabla_tree"])->name('tabla_tree');

// Nuevo servicio
Route::get("form_nuevo/{id}", [ServiciosController::class, "form_nuevo"])->name('form_nuevo');
Route::post("nuevo_servicio/{id}", [ServiciosController::class, "nuevo_servicio"])->name('nuevo_servicio');

Route::get("eliminar_servicio/{id}", [ServiciosController::class, "eliminar_servicio"])->name('eliminar_servicio');

Route::get("form_editar/{id}", [ServiciosController::class, "form_editar"])->name('form_editar');
Route::post("editar_servicio/{id}", [ServiciosController::class, "editar_servicio"])->name('editar_servicio');

// Huella digital
Route::get("huella_digital", [HuellaDigitalController::class, "huella_digital"])->name('huella_digital');
Route::get("form_nueva_huella", [HuellaDigitalController::class, "form_nueva_huella"])->name('form_nueva_huella');
Route::post("form_guardar_huella", [HuellaDigitalController::class, "form_guardar_huella"])->name('form_guardar_huella');

Route::get("form_editar_huella/{id}", [HuellaDigitalController::class, "form_editar_huella"])->name('form_editar_huella');
Route::post("form_guardar_editando_huella/{id}", [HuellaDigitalController::class, "form_guardar_editando_huella"])->name('form_guardar_editando_huella');

// Proforma
Route::get("pdf_huella_digital/{id}", [HuellaDigitalController::class, "pdf_huella_digital"])->name('pdf_huella_digital');
Route::get("form_proforma", [ProformaController::class, "form_proforma"])->name('form_proforma');
