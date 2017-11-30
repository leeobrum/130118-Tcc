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
					<th>Localizador</th>					
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
					<td>{{ $registro->localizador }}</td>					
					<td>{{ $registro->desconto }}</td>					
					<td>{{ $registro->modo_desconto }}</td>					
					<td>{{date( 'd/m/Y' , strtotime($registro->dthr_validade))}}</td>				
					<td>{{ $registro->ativo }}</td>					
					<td>
					@can('cupom_desconto_editar')
						<a class="btn orange" href="{{route('admin.cupom_descontos.editar', $registro->id)}}">Editar</a>
					@endcan
					@can('cupom_desconto_deletar')
						<a class="btn red" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admin.cupom_descontos.deletar', $registro->id) }}}' }">Deletar</a>
					@endcan
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="row">
		@can('cupom_desconto_adicionar')
			<a class="btn blue" href="{{route('admin.cupom_descontos.adicionar')}}">Adicionar</a>
		@endcan
	</div>
</div>
@endsection