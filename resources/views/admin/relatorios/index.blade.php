@extends('layouts.app')

@section('content')
<div class="container">
	<h4 class="center">Relatórios</h4>
	<div class="row">
	<nav>
	    <div class="nav-wrapper teal lighten-1">
	      <div class="col s12">
	        <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>	        
	        <a class="breadcrumb">Relatórios</a>	        
	      </div>
	    </div>
  	</nav>
	</div>
	<div class="row">
		<select id="options" name="tipo_relatorio" onchange="optionCheck()" required="required">
    		<option value="">-- Selecione</option>
    		<option value="Rcupom_desconto">Cupom de Descontos</option>
    		<option value="produto_status">Relatório Produtos</option>
		</select>
		 	<label for="tipo_relatorio">Tipo de Relatório</label>
	</div>
	<div id="dd" class="row" style="display:none;">
		<select id="status" name="status_produto" required="required">
    		<option value="RE">Status Reservado</option>
    		<option value="PA">Status Pago</option>
    		<option value="CA">Status Cancelado</option>
		</select>
		 	<label for="status_produto">Status do Produto</label>
	</div>	
	<div class="row">
		<a class="btn blue" id="btn" onclick="verValor()">Gerar Relatório</a>		
	</div>
</div>
@push('scripts')
    <script type="text/javascript" src="/js/init.js"></script>
@endpush
@endsection 