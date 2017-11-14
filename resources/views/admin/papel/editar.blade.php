@extends('layouts.app')

@section('content')
<div class="container">
	<h2 class="center">Editar Papel</h2>
	<div class="row">
	 	<nav>
		    <div class="nav-wrapper teal lighten-1">
		      	<div class="col s12">
			        <a href="{{ route('admin.principal')}}" class="breadcrumb">Início</a>
			        <a href="{{route('admin.papel')}}" class="breadcrumb">Lista de Papéis</a>
			        <a class="breadcrumb">Editar Papel</a>
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
		<form action="{{ route('admin.papel.atualizar',$registro->id) }}" method="post">

		{{csrf_field()}}
		<input type="hidden" name="_method" value="put">
		@include('admin.papel._form')

		<button class="btn blue">Editar</button>

			
		</form>	
	</div>
</div>
@endsection