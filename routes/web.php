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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home','MinhasTarefasController@store');
Route::get('/home/minhasTarefas','MinhasTarefasController@index')->name('tarefas.index');
Route::post('/home/minhasTarefas','MinhasTarefasController@show');
Route::delete('/home/minhasTarefas/{id}','MinhasTarefasController@destroy')->name('tarefas.delete');
Route::get('/home/tarefasRemovidas','RemovidosController@index')->name('tarefas.removidas');
Route::post('/home/tarefasRemovidas/{id}','RemovidosController@restore');
Route::delete('/home/tarefasRemovidas/{id}','RemovidosController@destroy');
Route::get('/home/{id}/edit','MinhasTarefasController@edit');
Route::post('/home/{id}/edit','MinhasTarefasController@update');
Route::get('/home/adicionarTipo','TiposController@index')->name('tipos.index');
Route::post('/home/adicionarTipo','TiposController@store');
Route::delete('/home/tiposRemovidas/{id}','TiposController@destroy');
Route::get('/home/perfil/{id}','UserController@index')->name('perfil.index');
Route::post('/home/perfil/{id}','UserController@update');
Route::get('/home/funcionarios','FuncionariosController@index')->name('funcionarios.index');
Route::get('/home/funcionarios/{id}/edit','FuncionariosController@edit');
Route::post('/home/funcionarios/{id}/edit','FuncionariosController@update');
Route::post('/home/subtarefas/{id}/update','subTarefasController@update');



