<?php

use App\Http\Middleware\EsAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\User;

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
    return view('welcome');
});



Route::get('/triagepreguntas/estado/{triagepreguntas}', 'TriagepreguntasController@estado')->middleware('auth');
//Route::get('/triagepreguntas/analizar', 'TriagepreguntasController@analizar');
Route::get('/pacientes/shows', 'PacientesController@shows')->middleware('auth');
Route::get('/turnos/mostrar', 'TurnosController@mostrar')->name('mostrar')->middleware('auth');
Route::get('/turnos/respuesta','TurnosController@respuesta')->middleware('auth');
Route::post('/salas/filtros','salasController@filtro')->name('salas.filtro')->middleware('auth');
// Route::post('/usuarios/registrar','usuariosController@create')->name('usuarios.registrar');

Route::get('/atencionclinica/internacion','AtencionClinicaController@internar')->middleware('auth');

Route::resource('/usuarios','usuariosController', ['except'=>['show', 'edit', 'update']])->middleware('auth');
Route::resource('/sintomas','SintomasController')->middleware('auth');
Route::resource('/atencionclinica','AtencionClinicaController')->middleware('auth');
Route::resource('/turnos','TurnosController')->middleware('auth');
Route::resource('/pacientes','PacientesController')->middleware('auth');
Route::resource('/triagepreguntas', 'TriagepreguntasController')->middleware('auth');
Route::resource('/salas', 'salasController')->middleware('auth');
Route::resource('/salas/areas', 'areasController', ['except' => ['destroy', 'show', 'edit']])->middleware('auth');
Route::resource('/protocolos', 'protocolosController')->middleware('auth');
Route::resource('/profesionales', 'profesionalesController', ['except' => ['destroy', 'show', 'edit', 'update']])->middleware('auth');

Route::get('/prueba', function(){
    $user = new User;
    $user->name = "Admin";
    $user->username = "admin";
    $user->email = "admin@gmail.com";
    $user->password = Hash::make("password");
    $user->id_rol = 1;
    $user->id= 3;
    $user->save();
});




// Auth::routes();
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
