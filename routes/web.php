<?php

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

use Illuminate\Routing\RouteGroup;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    //Rotas para gerenciar processos
    Route::get('/processos', 'ProcessoController@index')->name('index');
    Route::get('/processos/criar', 'ProcessoController@create')->name('criar');
    Route::post('/processos', 'ProcessoController@store')->name('salvar');
    Route::get('/processos/listar/{id}', 'ProcessoController@show')->name('listar');
    Route::post('/processos/{id}', 'ProcessoController@update')->name('atualizar');
    Route::get('/processos/editar/{id}', 'ProcessoController@edit')->name('editar');
    Route::get('/processos/apagar/{id}', 'ProcessoController@destroy')->name('apagar');

    //Rotas para gerenciar processos
    Route::get('/pedidos/criar', 'PedidoController@edit');
    Route::post('/pedidos/{id}', 'PedidoController@store');
    Route::get('/pedidos/editar/{id}', 'PedidoController@edit');
    Route::post('/pedidos/{id}', 'PedidoController@update');
    Route::get('/pedidos/apagar/{id}', 'PedidoController@destroy');
});