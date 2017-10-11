@extends('layouts.app')

@section('content')
<div class="container">
	<h4 class="center">Galeria de Imagens</h4>
	<div class="row">
	<nav>
	    <div class="nav-wrapper teal lighten-1">
	      <div class="col s12">
	        <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
	        <a href="{{route('admin.produtos')}}" class="breadcrumb">Lista de Produtos</a>
	        <a class="breadcrumb">Galeria de Imagens</a>	        
	      </div>
	    </div>
  	</nav>
	</div>
	<div class="row">
		<table>
			<thead>
				<tr>
					<th>Ordem</th>
					<th>Título</th>
					<th>Descrição</th>					
					<th>Imagem</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
			@foreach($registros as $registro)
				<tr>
					<td>{{ $registro->ordem }}</td>	
					<td>{{ $registro->titulo }}</td>
					<td>{{ $registro->descricao }}</td>									
					<td><img width="100" src="{{asset($registro->imagem)}}"></td>			
					<td>
						<a class="btn orange" href="{{route('admin.galerias.editar', $registro->id)}}">Editar</a>
						<a class="btn red" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admin.galerias.deletar', $registro->id) }}}' }">Deletar</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="row">
			<a class="btn blue" href="{{route('admin.galerias.adicionar', $produto->id)}}">Adicionar</a>
	</div>
</div>
@endsection