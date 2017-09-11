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
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col s12 m4">
			<h4>A Empresa</h4>
			<blockquote>
				Descrição breve sobre a empresa.
			</blockquote>
			<p>Testo Sobre a Empresa</p>
		</div>
	</div>
</div>
@endsection