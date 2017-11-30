<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CupomDesconto;

class CupomDescontoController extends Controller
{
    public function index(){
        if(auth()->user()->can('cupom_desconto_listar')){
            $registros = CupomDesconto::all();
            return view('admin.cupom_descontos.index', compact('registros'));
        }else{
            return redirect()->route('admin.principal');
        }         
    }

    public function adicionar(){   
        if(!auth()->user()->can('cupom_desconto_adicionar')){            
            return redirect()->route('admin.principal');
        }
        return view('admin.cupom_descontos.adicionar');
    }

    public function editar($id){
        if(!auth()->user()->can('cupom_desconto_editar')){            
            return redirect()->route('admin.principal');
        }
        $registro = CupomDesconto::find($id);   
        if( empty($registro->id) ) {
            return redirect()->route('admin.cupom_descontos');
        }
        return view('admin.cupom_descontos.editar', compact('registro'));
    }


    public function salvar(Request $request){
        if(!auth()->user()->can('cupom_desconto_adicionar')){            
            return redirect()->route('admin.principal');
        }
        $dados = $request->all();

        $registro = new CupomDesconto();
        
        $registro->nome = $dados['nome'];
        $registro->localizador = $dados['localizador'];
        $registro->modo_desconto = $dados['modo_desconto'];
        $registro->desconto = $dados['desconto'];
        $registro->modo_limite = $dados['modo_limite'];
        $registro->limite = $dados['limite'];
        //$registro->dthr_validade = $dados['dthr_validade'];
        $registro->dthr_validade = date( 'Y-m-d' , strtotime($dados['dthr_validade']));
        $registro->ativo = $dados['ativo'];
        //dd($registro);
        $registro->save();

         \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);

         return redirect()->route('admin.cupom_descontos');
    }

    public function atualizar(Request $request, $id){
        if(!auth()->user()->can('cupom_desconto_editar')){            
            return redirect()->route('admin.principal');
        }
        $registro = CupomDesconto::find($id);
        $dados = $request->all();

        $registro->nome = $dados['nome'];
        $registro->localizador = $dados['localizador'];
        $registro->modo_desconto = $dados['modo_desconto'];
        $registro->desconto = $dados['desconto'];
        $registro->modo_limite = $dados['modo_limite'];
        $registro->limite = $dados['limite'];
        //$registro->dthr_validade = $dados['dthr_validade'];
        $registro->dthr_validade = date( 'Y-m-d' , strtotime($dados['dthr_validade']));        
        $registro->ativo = $dados['ativo'];

        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.cupom_descontos');
    }

    public function deletar($id){
        if(!auth()->user()->can('cupom_desconto_deletar')){            
            return redirect()->route('admin.principal');
        }
        CupomDesconto::find($id)->delete();

        \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.cupom_descontos');
    }
}
