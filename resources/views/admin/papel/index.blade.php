@extends('layouts.app')

@section('content')
	<div class="container">
		<h2 class="center">Lista de Papéis</h2>

		<div class="row">
		 	<nav>
			    <div class="nav-wrapper teal lighten-1">
			      	<div class="col s12">
				        <a href="{{ route('admin.principal')}}" class="breadcrumb">Início</a>
				        <a class="breadcrumb">Lista de Papéis</a>
			      	</div>
			    </div>
		  	</nav>
		</div>

	
		<div class="row">
			<table>
				<thead>
					<tr>						
						<th>Nome</th>						
						<th>Descrição</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($registros as $registro)
					<tr>						
						<td>{{ $registro->nome }}</td>
						<td>{{ $registro->descricao }}</td>
						
						<td>
							@if($registro->nome != 'admin')
							@can('papel_editar')
							<a class="btn orange" href="{{ route('admin.papel.editar',$registro->id) }}">Editar</a>
							<a class="btn blue" href="{{ route('admin.papel.permissao',$registro->id) }}">Permissão</a>
							@endcan
							@else
							<a class="btn orange disabled" >Editar</a>
							<a class="btn blue disabled" >Permissão</a>
							@endif

							@if($registro->nome != 'admin')
							@can('papel_deletar')
							<a class="btn red" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admin.papel.deletar',$registro->id) }}' }">Deletar</a>
							@endcan
							@else
							<a class="btn red disabled" >Deletar</a>
							@endif							
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			
		</div>
		<div class="row">
			@can('papel_adicionar')
			<a class="btn blue" href="{{route('admin.papel.adicionar')}}">Adicionar</a>
			@endcan
		</div>
	</div>

@endsection