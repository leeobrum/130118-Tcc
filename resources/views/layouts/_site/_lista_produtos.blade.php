<div class="row section">
	<br>
	@include('layouts._site._filtros')
</div>
<div class="row section">
@foreach($produtos as $produto)	
	<div class="col s12 m3">
		<div class="card" >
			<div class="card-image">
				<a href="{{ route('site.produto', [$produto->id, str_slug($produto->nome, '_')]) }}">
				<img height="120" ="" src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}"></a>
			</div>
			<div class="card-content" style="height: 10rem;">
				<p><b>{{ $produto->nome }}</b></p>
				<p>R$ {{ number_format($produto->valor,2,",",".") }}</p>
			</div>
			<div class="card-action">
				<a href="{{ route('site.produto', [$produto->id, str_slug($produto->nome, '_')]) }}">Ver mais..</a>
			</div>
		</div>
	</div>
@endforeach
</div>
@if($paginacao)
	<div align="center" class="row">
			{{ $produtos->links() }}
	</div>
@endif