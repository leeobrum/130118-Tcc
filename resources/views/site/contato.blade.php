@extends('layouts.site')

@section('content')
<div class="container">
	<div class="row section">
		<h3 align="center">Contato</h3>
		<div class="divider"></div>
	</div>
	<div class="row section">
		<div class="col s12 m7">
			<img class="responsive-img" src="{{asset('img/logo.jpg')}}">
		</div>
		<div class="col s12 m5">
			<form class="col s12">
				<div class="input-field">
					<input type="text" name="nome" class="validade">
					<label>Nome:</label>
				</div>
				<div class="input-field">
					<input type="text" name="email" class="validade">
					<label>E-email:</label>
				</div>
				<div class="input-field">
					<textarea class="materialize-textarea"></textarea>
					<label>Mensagem:</label>
				</div>
				<button class="btn green">Enviar</button>
			</form>
		</div>
	</div>
</div>
@endsection