@extends('layouts.app')

@section('content')
<div class="container">
	<h4 class="center">Adicionar Produto</h4>
	<div class="row">
		<nav>
		    <div class="nav-wrapper teal lighten-1">
		      <div class="col s12">
		        <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
		        <a href="{{route('admin.produtos')}}" class="breadcrumb">Lista de Produtos</a>
		        <a class="breadcrumb">Adicionar Produto</a>
		      </div>
		    </div>
	  	</nav>
	</div>
	<div class="row">
		@if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
		<form action="{{route('admin.produtos.salvar')}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}

			@include('admin.produtos._form')

			<button class="btn blue">Salvar</button>
		</form>
	</div>
</div>

@endsection