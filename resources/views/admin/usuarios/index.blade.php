@extends('layouts.app')

@section('content')
<div class="container">
	<h4 class="center">Lista de usuários</h4>
	<div class="row">
	<nav>
	    <div class="nav-wrapper teal lighten-1">
	      <div class="col s12">
	        <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
	        <a href="#" class="breadcrumb">Lista de Usuários</a>	        
	      </div>
	    </div>
  	</nav>
	</div>
	<div class="row">
		<table>
			<thead>
				<tr>
					<th>Id</th>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
			@foreach($usuarios as $usuario)
				<tr>
					<td>{{ $usuario->id }}</td>
					<td>{{ $usuario->name }}</td>
					<td>{{ $usuario->email }}</td>
					<td>
						<a class="btn orange" href="#!">Editar</a>
						<a class="btn red" href="#!">Deletar</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection