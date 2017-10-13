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


Route::get('/',			['as'=>'site.home', 'uses'=>'Site\HomeController@index']);
Route::get('/sobre',	['as'=>'site.sobre', 'uses'=>'Site\PaginaController@sobre']);

Route::get('/contato',			['as'=>'site.contato', 'uses'=>'Site\PaginaController@contato']);
Route::get('/contato/enviar',	['as'=>'site.contato.enviar', 'uses'=>'Site\PaginaController@enviarContato']);
Route::post('/contato/enviar',	['as'=>'site.contato.enviar', 'uses'=>'Site\PaginaController@enviarContato']);

Route::get('/produto/{id}/{titulo?}',	['as'=>'site.produto', 'uses'=>'Site\ProdutoController@index']);
Route::get('/admin/login',				['as'=>'admin.login', function(){ return view('admin.login.index');}]);
Route::post('/admin/login',				['as'=>'admin.login', 'uses'=>'Admin\UsuarioController@login']);

Route::get('/busca',	['as'=>'site.busca', 'uses'=>'Site\HomeController@busca']);

Route::group(['middleware'=>'auth'], function(){

	Route::get('/admin',			['as'=>'admin.principal', function(){ return view('admin.principal.index');}]);	
	Route::get('/admin/login/sair',	['as'=>'admin.login.sair', 'uses'=>'Admin\UsuarioController@sair']);

//Usuários
	Route::get('/admin/usuarios',				['as'=>'admin.usuarios', 'uses'=>'Admin\UsuarioController@index']);
	Route::get('/admin/usuarios/adicionar',		['as'=>'admin.usuarios.adicionar', 'uses'=>'Admin\UsuarioController@adicionar']);
	Route::get('/admin/usuarios/editar/{id}',	['as'=>'admin.usuarios.editar', 'uses'=>'Admin\UsuarioController@editar']);
	Route::get('/admin/usuarios/deletar/{id}',	['as'=>'admin.usuarios.deletar', 'uses'=>'Admin\UsuarioController@deletar']);
	Route::post('/admin/usuarios/salvar',		['as'=>'admin.usuarios.salvar', 'uses'=>'Admin\UsuarioController@salvar']);
	Route::put('/admin/usuarios/atualizar{id}',	['as'=>'admin.usuarios.atualizar', 'uses'=>'Admin\UsuarioController@atualizar']);

//Paginas
	Route::get('/admin/paginas', 				['as'=>'admin.paginas', 'uses' =>'Admin\PaginaController@index']);
	Route::get('/admin/paginas/editar/{id}', 	['as'=>'admin.paginas.editar', 'uses' =>'Admin\PaginaController@editar']);
	Route::put('/admin/paginas/atualizar/{id}', ['as'=>'admin.paginas.atualizar', 'uses' =>'Admin\PaginaController@atualizar']);

//Tipos
	Route::get('/admin/tipos',				['as'=>'admin.tipos', 'uses'=>'Admin\TipoController@index']);
	Route::get('/admin/tipos/adicionar',	['as'=>'admin.tipos.adicionar', 'uses'=>'Admin\TipoController@adicionar']);
	Route::get('/admin/tipos/editar/{id}',	['as'=>'admin.tipos.editar', 'uses'=>'Admin\TipoController@editar']);
	Route::get('/admin/tipos/deletar/{id}',	['as'=>'admin.tipos.deletar', 'uses'=>'Admin\TipoController@deletar']);
	Route::post('/admin/tipos/salvar',		['as'=>'admin.tipos.salvar', 'uses'=>'Admin\TipoController@salvar']);
	Route::put('/admin/tipos/atualizar{id}',['as'=>'admin.tipos.atualizar', 'uses'=>'Admin\TipoController@atualizar']);

//Produtos
	Route::get('/admin/produtos',				['as'=>'admin.produtos', 'uses'=>'Admin\ProdutoController@index']);
	Route::get('/admin/produtos/adicionar',		['as'=>'admin.produtos.adicionar', 'uses'=>'Admin\ProdutoController@adicionar']);
	Route::get('/admin/produtos/editar/{id}',	['as'=>'admin.produtos.editar', 'uses'=>'Admin\ProdutoController@editar']);
	Route::get('/admin/produtos/deletar/{id}',	['as'=>'admin.produtos.deletar', 'uses'=>'Admin\ProdutoController@deletar']);
	Route::post('/admin/produtos/salvar',		['as'=>'admin.produtos.salvar', 'uses'=>'Admin\ProdutoController@salvar']);
	Route::put('/admin/produtos/atualizar{id}',	['as'=>'admin.produtos.atualizar', 'uses'=>'Admin\ProdutoController@atualizar']);
	
//Galeria
	Route::get('/admin/galerias/{id}',			['as'=>'admin.galerias', 'uses'=>'Admin\GaleriaController@index']);
	Route::get('/admin/galerias/adicionar/{id}',['as'=>'admin.galerias.adicionar', 'uses'=>'Admin\GaleriaController@adicionar']);
	Route::get('/admin/galerias/editar/{id}',	['as'=>'admin.galerias.editar', 'uses'=>'Admin\GaleriaController@editar']);
	Route::get('/admin/galerias/deletar/{id}',	['as'=>'admin.galerias.deletar', 'uses'=>'Admin\GaleriaController@deletar']);
	Route::post('/admin/galerias/salvar/{id}',	['as'=>'admin.galerias.salvar', 'uses'=>'Admin\GaleriaController@salvar']);
	Route::put('/admin/galerias/atualizar{id}',	['as'=>'admin.galerias.atualizar', 'uses'=>'Admin\GaleriaController@atualizar']);
}); 

