<?php

use Illuminate\Support\Facades\Route;

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

$controller_path = 'App\Http\Controllers';

// Main Page Route

// pages


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
$controller_path = 'App\Http\Controllers';
    //Rutas de Proyectos
    Route::get('/', $controller_path . '\pages\HomePage@index')->name('pages-home');
    Route::get('/projects', $controller_path . '\pages\Projects@index')->name('pages-projects');
    
    Route::get('/createproyecto', $controller_path . '\pages\HomePage@create')->middleware('can:admin.proyectos.create')->name('pages-createproyecto');
    Route::post('/proy-store', $controller_path . '\pages\HomePage@store')->name('pages-store');
    Route::get('/editarproyecto/{id}', $controller_path . '\pages\HomePage@edit')->middleware('can:admin.proyectos.edit')->name('pages-editarproyecto');
    Route::put('/actualizar/{id}', $controller_path . '\pages\HomePage@update')->name('pages-actualizar');

    Route::get('/buscarciudades/{id}', $controller_path . '\pages\HomePage@listarCiudades');
    

    //Rutas de Roles
    Route::get('roles/page-2', $controller_path . '\pages\UserController@index')->name('pages-page-2');
    //Ruta crear usuario
    Route::get('roles/create-user', $controller_path . '\pages\UserController@create')->name('user.create');
    Route::post('/store', $controller_path . '\pages\UserController@store')->name('user-store');
    Route::get('roles/users-edit-form/{user}', $controller_path . '\pages\UserController@edit')->name('user.edit');
    Route::put('/user-actualizar/{user}', $controller_path . '\pages\UserController@update')->name('user.actualizar');


    Route::get('/page-3', $controller_path . '\pages\Page3@index')->name('pages-page-3');



    //Rutas de la informacion del proyecto
    Route::get('info-proyecto/info-proy/{id}', $controller_path . '\pages\InfoProyecto@index')->name('info-proy');


    //Rutas de pedidos
    Route::get('pedidos/index-pedidos/{id}', $controller_path . '\pages\PedidosController@index')->middleware('can:admin.pedido.index')->name('index-pedidos');
    //Route::get('pedidos/create-pedidos/{id}', $controller_path . '\pages\PedidosController@create')->middleware('can:admin.pedido.create')->name('create-pedidos');
    Route::post('pedidos/store', $controller_path . '\pages\PedidosController@store')->name('pedidos.store');
    Route::get('pedidos/createpedidos/{id}', $controller_path . '\pages\PedidosController@create')->middleware('can:admin.pedido.create')->name('create-pedidos');


    //Ruta de roles
    Route::get('content-rol/index-rol', $controller_path . '\pages\RoleController@index')->name('index-rol');
    Route::get('content-rol/create-rol', $controller_path . '\pages\RoleController@create')->name('create-rol');
    Route::get('content-rol/edit-rol/{id}', $controller_path . '\pages\RoleController@edit')->name('edit-rol');
});

