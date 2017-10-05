<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/',			['as'=>'site.home', function(){ return view('site.home');}]);
Route::get('/sobre',	['as'=>'site.sobre', 'uses'=>'Site\PaginaController@sobre']);

Route::get('/contato',	['as'=>'site.contato', 'uses'=>'Site\PaginaController@contato']);
Route::get('/contato/enviar',	['as'=>'site.contato.enviar', 'uses'=>'Site\PaginaController@enviarContato']);
Route::post('/contato/enviar',	['as'=>'site.contato.enviar', 'uses'=>'Site\PaginaController@enviarContato']);

Route::get('/produto/{id}/{titulo?}',['as'=>'site.produto', function(){ return view('site.produto');}]);
Route::get('/admin/login',['as'=>'admin.login', function(){ return view('admin.login.index');}]);
Route::post('/admin/login',['as'=>'admin.login', 'uses'=>'Admin\UsuarioController@login']);

Route::group(['middleware'=>'auth'], function(){

	Route::get('/admin',['as'=>'admin.principal', function(){ return view('admin.principal.index');}]);	
	Route::get('/admin/login/sair',['as'=>'admin.login.sair', 'uses'=>'Admin\UsuarioController@sair']);

	Route::get('/admin/usuarios',['as'=>'admin.usuarios', 'uses'=>'Admin\UsuarioController@index']);
	Route::get('/admin/usuarios/adicionar',		['as'=>'admin.usuarios.adicionar', 'uses'=>'Admin\UsuarioController@adicionar']);
	Route::get('/admin/usuarios/editar/{id}',	['as'=>'admin.usuarios.editar', 'uses'=>'Admin\UsuarioController@editar']);
	Route::get('/admin/usuarios/deletar/{id}',	['as'=>'admin.usuarios.deletar', 'uses'=>'Admin\UsuarioController@deletar']);
	Route::post('/admin/usuarios/salvar',		['as'=>'admin.usuarios.salvar', 'uses'=>'Admin\UsuarioController@salvar']);
	Route::put('/admin/usuarios/atualizar{id}',	['as'=>'admin.usuarios.atualizar', 'uses'=>'Admin\UsuarioController@atualizar']);

	Route::get('/admin/paginas', ['as'=>'admin.paginas', 'uses' =>'Admin\PaginaController@index']);
	Route::get('/admin/paginas/editar/{id}', 	['as'=>'admin.paginas.editar', 'uses' =>'Admin\PaginaController@editar']);
	Route::put('/admin/paginas/atualizar/{id}', ['as'=>'admin.paginas.atualizar', 'uses' =>'Admin\PaginaController@atualizar']);

	Route::get('/admin/tipos',['as'=>'admin.tipos', 'uses'=>'Admin\TipoController@index']);
	Route::get('/admin/tipos/adicionar',		['as'=>'admin.tipos.adicionar', 'uses'=>'Admin\TipoController@adicionar']);
	Route::get('/admin/tipos/editar/{id}',	['as'=>'admin.tipos.editar', 'uses'=>'Admin\TipoController@editar']);
	Route::get('/admin/tipos/deletar/{id}',	['as'=>'admin.tipos.deletar', 'uses'=>'Admin\TipoController@deletar']);
	Route::post('/admin/tipos/salvar',		['as'=>'admin.tipos.salvar', 'uses'=>'Admin\TipoController@salvar']);
	Route::put('/admin/tipos/atualizar{id}',	['as'=>'admin.tipos.atualizar', 'uses'=>'Admin\TipoController@atualizar']);
	
}); 

