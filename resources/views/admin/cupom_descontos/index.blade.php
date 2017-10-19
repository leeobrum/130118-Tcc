@extends('layouts.app')

@section('content')
<div class="container">
	<h4 class="center">Cupons de Desconto</h4>
	<div class="row">
	<nav>
	    <div class="nav-wrapper teal lighten-1">
	      <div class="col s12">
	        <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
	        <a class="breadcrumb">Cupons de Desconto</a>	        
	      </div>
	    </div>
  	</nav>
	</div>
	<div class="row">
		<table>
			<thead>
				<tr>
					<th>Nome</th>					
					<th>Desconto</th>					
					<th>Modo Desconto</th>					
					<th>Validade</th>					
					<th>Ativo</th>					
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
			@foreach($registros as $registro)
				<tr>
					<td>{{ $registro->nome }}</td>					
					<td>{{ $registro->desconto }}</td>					
					<td>{{ $registro->modo_desconto }}</td>					
					<td>{{date( 'd/m/Y' , strtotime($registro->dthr_validade))}}</td>				
					<td>{{ $registro->ativo }}</td>					
					<td>
						<a class="btn orange" href="{{route('admin.cupom_descontos.editar', $registro->id)}}">Editar</a>
						<a class="btn red" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admin.cupom_descontos.deletar', $registro->id) }}}' }">Deletar</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="row">
			<a class="btn blue" href="{{route('admin.cupom_descontos.adicionar')}}">Adicionar</a>
	</div>
</div>
@endsection