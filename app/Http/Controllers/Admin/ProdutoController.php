<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Produto;
use App\Tipo;

class ProdutoController extends Controller
{
    public function index(){
        $registros = Produto::all();
        return view('admin.produtos.index', compact('registros'));
    }

    public function adicionar(){

    	$tipos = Tipo::all();

        return view('admin.produtos.adicionar', compact('tipos'));
    }

    public function editar($id){
        $registro = Produto::find($id);
        $tipos = Tipo::all();

        return view('admin.produtos.editar', compact('registro', 'tipos'));
    }

    public function salvar(Request $request){
        $dados = $request->all();

        $registro = new Produto();
        
        $registro->nome = $dados['nome'];
        $registro->descricao = $dados['descricao'];
        $registro->tipo_id = $dados['tipo_id'];

        $file = $request->file('imagem');
    	if($file){
    		$rand = rand(11111,99999);
    		$diretorio = "img/produtos/".str_slug($dados['nome'], '_')."/";
    		$ext = $file->guessClientExtension();
    		$nomeArquivo = "_img_".$rand.".".$ext;
    		$file->move($diretorio,$nomeArquivo);
    		$registro->imagem = $diretorio.$nomeArquivo;
    	}

        $registro->valor = $dados['valor'];
        $registro->qnt = $dados['qnt'];
        $registro->ativo = $dados['ativo'];

        $registro->save();

         \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);

         return redirect()->route('admin.produtos');      
    }  

    public function atualizar(Request $request, $id){
        $registro = Produto::find($id);
        $dados = $request->all();

        $registro->nome = $dados['nome'];
        $registro->descricao = $dados['descricao'];
        $registro->tipo_id = $dados['tipo_id'];

        $file = $request->file('imagem');
    	if($file){
    		$rand = rand(11111,99999);
    		$diretorio = "img/produtos/".str_slug($dados['nome'], '_')."/";
    		$ext = $file->guessClientExtension();
    		$nomeArquivo = "_img_".$rand.".".$ext;
    		$file->move($diretorio,$nomeArquivo);
    		$registro->imagem = $diretorio.$nomeArquivo;
    	}

        $registro->valor = $dados['valor']; 
        $registro->qnt = $dados['qnt']; 
        $registro->ativo = $dados['ativo'];

        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.produtos');

    }

    public function deletar($id){
               
        Produto::find($id)->delete();

        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.produtos');
    }
}
