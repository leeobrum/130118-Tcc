<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Produto;

class ProdutoController extends Controller
{
    public function index($id){
    	$produto = Produto::find($id);
    	$galeria = $produto->galeria()->orderBy('ordem')->get();
    	$direcaoImagem = ['center-align', 'left-align', 'right-align'];

		return view('site.produto', compact('produto', 'galeria', 'direcaoImagem'));
    }
}
