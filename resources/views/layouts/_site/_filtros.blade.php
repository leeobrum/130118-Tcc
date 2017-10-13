<div class="row">
	<form action="{{ route('site.busca') }}">
		<div class="input-field col s6 m4">
			<select name="tipo_id">
				<option {{ isset($busca['tipo_id']) && $busca['tipo_id'] == 'todos' ? 'selected' : '' }} value="todos">Todos os Tipos</option>
				@foreach($tipos as $tipo)
				<option {{ isset($busca['tipo_id']) && $busca['tipo_id'] == $tipo->id ? 'selected' : '' }} value="{{ $tipo->id }}">{{ $tipo->titulo }}</option>
				@endforeach
			</select>
			<label>Tipo de Produto</label>
		</div>
		<div class="input-field col s12 m4">
			<select name="valor">
				<option {{ isset($busca['valor']) && $busca['valor'] == '0' ? 'selected' : '' }} value="0">Todos os Valores</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == '1' ? 'selected' : '' }} value="1">Até R$ 100,00</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == '2' ? 'selected' : '' }} value="2">R$ 100,00 à 500,00</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == '3' ? 'selected' : '' }} value="3">R$ 500,00 à R$ 1.000,00</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == '4' ? 'selected' : '' }} value="4">Acima de R$ 1.000,00</option>
			</select>
			<label>Valor</label>
		</div>
		<div class="input-field col s12 m4">
			<button class="btn deep-range darken-1 right">Filtrar</button>
		</div>
	</form>
</div>