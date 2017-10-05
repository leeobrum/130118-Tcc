@extends('layouts.app')

@section('content')
<div class="container">
	<h4 class="center">Editar Tipos</h4>
	<div class="row">
		<nav>
		    <div class="nav-wrapper teal lighten-1">
		      <div class="col s12">
		        <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
		        <a href="{{route('admin.usuarios')}}" class="breadcrumb">Lista de Tipos</a>
		        <a class="breadcrumb">Editar Tipo</a>
		      </div>
		    </div>
	  	</nav>
	</div>
	<div class="row">
		<form action="{{route('admin.tipos.atualizar', $registro->id)}}" method="post">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="put">

			@include('admin.tipos._form')

			<button class="btn blue">Editar</button>
		</form>
	</div>
</div>

@endsection