<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {
    	$dados = $request->all();
    	
    	if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password']])){
    		
    		\Session::flash('mensagem',['msg'=>'Login realizado com sucesso!','class'=>'green white-text']);

    		return redirect()->route('admin.principal');
    	}

    	\Session::flash('mensagem',['msg'=>'Erro! Confira seus dados.','class'=>'red white-text']);

    	return redirect()->route('admin.login');

    }

    public function sair(){
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function index(){
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }
}
