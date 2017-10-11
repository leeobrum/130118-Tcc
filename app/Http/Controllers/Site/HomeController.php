<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Produto;

class HomeController extends Controller
{
    public function index(){
    	$produtos = Produto::orderBy('id', 'desc')->paginate(8);

    	return view('site.home', compact('produtos'));
    }
}
