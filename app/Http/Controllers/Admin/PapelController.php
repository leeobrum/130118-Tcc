<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\PapelRequest;
use App\Http\Controllers\Controller;
use App\Papel;
use App\Permissao;

class PapelController extends Controller
{
    public function index(){
    	$registros = Papel::all();
    	return view('admin.papel.index', compact('registros'));
    }

    public function adicionar(){
    	return view('admin.papel.adicionar');
    }

    public function salvar(PapelRequest $request){
    	Papel::create($request->all());

    	return redirect()->route('admin.papel');
    }    

    public function editar($id){
    	if(Papel::find($id)->nome == "admin"){
    		return redirect()->route('admin.papel');
    	}

    	$registro = Papel::find($id);
    	return view('admin.papel.editar',compact('registro'));
    }

    public function atualizar(PapelRequest $request,$id){
    	if(Papel::find($id)->nome == "admin"){
    		return redirect()->route('admin.papel');
    	}
    	Papel::find($id)->update($request->all());
    	return redirect()->route('admin.papel');
    }

    public function deletar($id){
    	if(Papel::find($id)->nome == "admin"){
    		return redirect()->route('admin.papel');
    	}
    	Papel::find($id)->delete();
    	return redirect()->route('admin.papel');
    }

    public function permissao($id){
        /*if(!auth()->user()->can('papel_editar')){            
            return redirect()->route('admin.principal');
        }*/
        $papel = Papel::find($id);
        $permissao = Permissao::all();
        return view('admin.papel.permissao',compact('papel','permissao'));
    }

    public function salvarPermissao(Request $request, $id){
        /*if(!auth()->user()->can('papel_editar')){            
            return redirect()->route('admin.principal');
        }*/
        $papel = Papel::find($id);
        $permissao = Permissao::find($request['permissao_id']);
        $papel->adicionarPermissao($permissao);

        return redirect()->back();
    }

    public function removerPermissao($id, $id_permissao){
        /*if(!auth()->user()->can('papel_editar')){            
            return redirect()->route('admin.principal');
        }*/
        $papel = Papel::find($id);
        $permissao = Permissao::find($id_permissao);
        $papel->removerPermissao($permissao);
        
        return redirect()->back();
    }
}
