<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\TipoRequest;
use App\Http\Controllers\Controller;
use App\Tipo;
use App\Produto;

class TipoController extends Controller
{
    public function index(){
        $registros = Tipo::all();
        return view('admin.tipos.index', compact('registros'));
    }

    public function adicionar(){
        return view('admin.tipos.adicionar');
    }

    public function salvar(TipoRequest $request){
        $dados = $request->all();

        $registro = new Tipo();
        
        $registro->titulo = $dados['titulo'];

        $registro->save();

         \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);

         return redirect()->route('admin.tipos');      
    }

    public function editar($id){
        $registro = Tipo::find($id);
        return view('admin.tipos.editar', compact('registro'));
    }

    public function atualizar(TipoRequest $request, $id){
        $registro = Tipo::find($id);
        $dados = $request->all();
        $registro->titulo = $dados['titulo'];

        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.tipos');

    }

    public function deletar($id){
        
        if(Produto::where('tipo_id', '=' , $id)->count()){

            $msg = "Nao é possivel deletar esse Tipo! Esses Tipo de Produto (";
            $produtos = Produto::where('tipo_id', "=" ,$id)->get();

            foreach ($produtos as $produto) {
                $msg .= " Id: ".$produto->id." ";
            }
            $msg.= ") estao relacionados.";

            \Session::flash('mensagem',['msg'=>$msg,'class'=>'red white-text']);  
            return redirect()->route('admin.tipos');          
        }

        Tipo::find($id)->delete();

        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.tipos');
    }
}
