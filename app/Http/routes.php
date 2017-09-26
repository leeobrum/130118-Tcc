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
Route::get('/sobre',	['as'=>'site.sobre', function(){ return view('site.sobre');}]);
Route::get('/contato',	['as'=>'site.contato', function(){ return view('site.contato');}]);
Route::get('/produto/{id}/{titulo?}',['as'=>'site.produto', function(){ return view('site.produto');}]);
Route::get('/admin/login',['as'=>'admin.login', function(){ return view('admin.login.index');}]);

Route::post('/admin/login',['as'=>'admin.login', 'uses'=>'Admin\UsuarioController@login']);

Route::group(['middleware'=>'auth'], function(){

	Route::get('/admin',['as'=>'admin.principal', function(){ return view('admin.principal.index');}]);	
	Route::get('/admin/login/sair',['as'=>'admin.login.sair', 'uses'=>'Admin\UsuarioController@sair']);
	Route::get('/admin/usuarios',['as'=>'admin.usuarios', 'uses'=>'Admin\UsuarioController@index']);
});

