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

    public function adicionar(){
        return view('admin.usuarios.adicionar');
    }

    public function salvar(Request $request){
        $dados = $request->all();

        $usuario = new User();
        
        if(strlen($dados['password']) > 5){
            $usuario->name = $dados['name'];
            $usuario->email = $dados['email'];
            $usuario->password = bcrypt($dados['password']);
            $usuario->save();

            \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);

            return redirect()->route('admin.usuarios');
        }else{
            \Session::flash('mensagem',['msg'=>'Tente uma senha com pelo menos 6 caracteres.!','class'=>'red white-text']);
            return redirect()->route('admin.usuarios.adicionar');
        }       
    }

    public function editar($id){
        $usuario = User::find($id);
        return view('admin.usuarios.editar', compact('usuario'));
    }

    public function atualizar(Request $request, $id){
        $usuario = User::find($id);
        $dados = $request->all();

        if(isset($dados['password']) && strlen($dados['password']) > 5){
            $dados['password'] = bcrypt($dados['password']);

            $usuario->update($dados);
        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.usuarios');

        }else {
            unset($dados['password']);
            \Session::flash('mensagem',['msg'=>'Tente uma senha com pelo menos 6 caracteres.','class'=>'red white-text']);
            return redirect()->route('admin.usuarios.editar', $usuario->id);
        }
    }

    public function deletar($id){
        User::find($id)->delete();

        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'gree white-text']);
        return redirect()->route('admin.usuarios');
    }
}
