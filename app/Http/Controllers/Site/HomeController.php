<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Produto;
use App\Tipo;

class HomeController extends Controller
{
    public function index(){
    	$produtos = Produto::where('ativo','=','S')->orderBy('id', 'desc')->paginate(8);

    	$paginacao = true;
    	$tipos = Tipo::orderBy('titulo')->get();
    	return view('site.home', compact('produtos', 'paginacao', 'tipos'));
    }

    public function busca(Request $request){
    	$busca = $request->all();
  
    	$paginacao = false;
    	$tipos = Tipo::orderBy('titulo')->get();

    	if($busca['tipo_id'] == 'todos'){
    		$filtroTipo = [
    			['tipo_id', '<>', null]
    		];
    	}else{
    		$filtroTipo = [
    			['tipo_id', '=', $busca['tipo_id']]
    		];
    	}
 		$filtroValor = [
    			[['valor', '>=', 0]],
    			[['valor', '<=', 100]],
    			[['valor', '>=', 100], ['valor', '<=', 500]],
    			[['valor', '>=', 500], ['valor', '<=', 1000]],    			
    			[['valor', '>=', 1000]],
    		];
    	$numValor = $busca['valor'];

    	$produtos = Produto::where('ativo','=','S')
    	->where($filtroTipo)
    	->where($filtroValor[$numValor])
    	->orderBy('id', 'desc')->get();

    	return view('site.busca', compact('busca', 'produtos', 'paginacao', 'tipos'));
    }
}
