<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Galeria;
use App\Produto;

class GaleriaController extends Controller
{
    public function index($id){

    	$produto = Produto::find($id);
        $registros = $produto->galeria()->orderBy('ordem', 'asc')->get();
        return view('admin.galerias.index', compact('registros', 'produto'));
    }

    public function adicionar($id){
        
        $produto = Produto::find($id);        

        return view('admin.galerias.adicionar',compact('produto'));
    }

    public function editar($id){
        $registro = Galeria::find($id);
        $produto = $registro->produto;

        return view('admin.galerias.editar', compact('registro', 'produto'));
    }

    public function salvar(Request $request,$id){
	    $produto = Produto::find($id);

	    $dados = $request->all();

	    if($produto->galeria()->count()){
	    	$galeria = $produto->galeria()->orderBy('ordem','desc')->first();
	    	$ordemAtual = $galeria->ordem;
	    }else{
	    	$ordemAtual = 0;
	    }
	    

	    if($request->hasFile('imagens')){
	    	$arquivos = $request->file('imagens');
	    	foreach ($arquivos as $imagem) {
	    		$registro = new Galeria();

	    		$rand = rand(11111,99999);
	    		$diretorio = "img/produtos/".str_slug($produto->nome,'_')."/";
	    		$ext = $imagem->guessClientExtension();
	    		$nomeArquivo = "_img_".$rand.".".$ext;
	    		$imagem->move($diretorio,$nomeArquivo);
	    		$registro->produto_id = $produto->id;
	    		$registro->ordem = $ordemAtual + 1;
	    		$ordemAtual++;
	    		$registro->imagem = $diretorio.'/'.$nomeArquivo;
	    		$registro->save();	    		
	    	}
	    }

	    \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);

	    return redirect()->route('admin.galerias',$produto->id);    
    }  

    public function atualizar(Request $request, $id){
        $registro = Galeria::find($id);
        $dados = $request->all();

        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];
        $registro->ordem = $dados['ordem'];

        $produto = $registro->produto;

        $file = $request->file('imagem');
    	if($file){
    		$rand = rand(11111,99999);
    		$diretorio = "img/produtos/".str_slug($produto->nome, '_')."/";
    		$ext = $file->guessClientExtension();
    		$nomeArquivo = "_img_".$rand.".".$ext;
    		$file->move($diretorio,$nomeArquivo);
    		$registro->imagem = $diretorio.$nomeArquivo;
    	}

        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.galerias', $produto->id);

    }

    public function deletar($id){
        $galeria = Galeria::find($id);
        $produto = $galeria->produto;

        $galeria->delete();

        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.galerias', $produto->id);
    }
}
