@extends('layouts.app')

@section('content')
<div class="container">
	<h4 class="center">Lista de Produtos</h4>
	<div class="row">
	<nav>
	    <div class="nav-wrapper teal lighten-1">
	      <div class="col s12">
	        <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
	        <a class="breadcrumb">Lista de Produtos</a>	        
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
					<th>Tipo</th>
					<th>Valor</th>
					<th>Imagem</th>
					<th>Ativo</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
			@foreach($registros as $registro)
				<tr>
					<td>{{ $registro->id }}</td>
					<td>{{ $registro->nome }}</td>
					<td>{{ $registro->tipo->titulo }}</td>
					<td>R$ {{ number_format($registro->valor,2,",",".") }}</td>
					<td><img width="100" src="{{asset($registro->imagem)}}"></td>
					<td>{{ $registro->ativo }}</td>
					<td>
						<a class="btn orange" href="{{route('admin.produtos.editar', $registro->id)}}">Editar</a>
						<a class="btn blue" href="{{route('admin.galerias', $registro->id)}}">Galeria</a>
						<a class="btn red" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admin.produtos.deletar', $registro->id) }}}' }">Deletar</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="row">
			<a class="btn blue" href="{{route('admin.produtos.adicionar')}}">Adicionar</a>
	</div>
</div>
@endsection