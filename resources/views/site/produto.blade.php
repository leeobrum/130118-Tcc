@extends('layouts.site')

@section('content')
<div class="container">
	<div class="row section">
		<h3 align="center">Produto</h3>
		<div class="divider"></div>
	</div>
	<div class="row section">
		<div class="col s12 m8">
			<div class="row">
				<div class="slider">
					<ul class="slides">
						<li>
							<img src="{{asset('img/janela_1.jpg')}}">
							<div class="caption center-align">
								<h3>Título da Imagem</h3>
								<h5>Descrição do Slide</h5>
							</div>
						</li>
						<li>
							<img src="{{asset('img/janela_1.jpg')}}">
							<div class="caption left-align">
								<h3>Título da Imagem</h3>
								<h5>Descrição do Slide</h5>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="row" align="center">
				<button onclick="sliderPrev()" class="btn green">Anterior</button>
				<button onclick="sliderNext()" class="btn green">Proxima</button>
			</div>
		</div>
		<div class="col s12 m4">
			<h4>Titulo do Produto</h4>
			<blockquote>
				Descrição breve sobre o produto.
			</blockquote>
			<p><b>Codigo: </b> 245 </p>
			<p><b>Status: </b> Ativo </p>
			<p><b>Valor: </b> R$ 23,00 </p>
			<a class="btn deep-orange darken-1" href="{{route('site.contato')}}">Comprar</a>
		</div>
	</div>
</div>
@endsection