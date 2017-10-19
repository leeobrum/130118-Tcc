@extends('layouts.app')

@section('content')
<div class="container">
	<h4 class="center">Adicionar Cupom de Desconto</h4>
	<div class="row">
		<nav>
		    <div class="nav-wrapper teal lighten-1">
		      <div class="col s12">
		        <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
		        <a href="{{route('admin.cupom_descontos')}}" class="breadcrumb">Cupons de Desconto</a>
		        <a class="breadcrumb">Adicionar Cupom de Desconto</a>
		      </div>
		    </div>
	  	</nav>
	</div>
	<div class="row">
		<form action="{{route('admin.cupom_descontos.salvar')}}" method="post">
			{{csrf_field()}}

			@include('admin.cupom_descontos._form')

			<button class="btn blue">Salvar</button>
		</form>
	</div>
</div>

@endsection