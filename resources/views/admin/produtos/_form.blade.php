<div class="input-field">
	<input type="text" name="nome" class="validate" value="{{isset($registro->nome) ? $registro->nome : ''}}">
	<label>Nome do Produto:</label>
</div>
<div class="input-field">
	<input type="text" name="descricao" class="validade" value="{{ isset($registro->descricao) ? $registro->descricao : '' }}">
	<label>Descrição</label>
</div>
<div class="input-field">
    <select name="tipo_id">
        @foreach($tipos as $tipo)
            <option value="{{ $tipo->id }}" {{(isset($registro->tipo_id) && $registro->tipo_id == $tipo->id  ? 'selected' : '')}}>{{ $tipo->titulo }}</option>
        @endforeach
    </select>
    <label>Tipo do Produto</label>
</div>
<div class="input-field col m6 s12">
    <input type="text" name="valor" class="validate" value="{{(isset($registro->valor) ? $registro->valor : '')}}">
    <label>Valor (Ex: 234.90)</label>
</div>
<div class="input-field col m6 s12">
	<input type="number" name="qnt" class="validate" value="{{(isset($registro->qnt) ? $registro->qnt : '')}}">
    <label>Quantidade</label>
</div>
<div class="row">
	<div class="file-field input-field col m6 s12">
		<div class="btn">
		<span>Imagem</span>
			<input type="file" name="imagem">
		</div>
		<div class="file-path-wrapper">
			<input type="text" class="file-path validate">
		</div>
	</div>
	<div class="col m6 s12">
		@if(isset($registro->imagem))
			<img width="120" src="{{asset($registro->imagem)}}">
		@endif
	</div>
</div>
<div class="input-field">
	<select name="ativo">
		<option value="S" {{ (isset($registro->ativo) && $registro->ativo == 'S' ? 'selected' : '')}}>Sim</option>
		<option value="N" {{ (isset($registro->ativo) && $registro->ativo == 'N' ? 'selected' : '')}}>Não</option>
	</select>
	<label>Ativo</label>
</div>
