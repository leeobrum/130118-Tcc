$(document).ready(function(){
	$(".button-collapse").sideNav();
	$('.slider').slider({full_width: true});
	$('select').material_select();
});

function sliderPrev(){
	$('.slider').slider('pause');
	$('.slider').slider('prev');
}

function sliderNext(){
	$('.slider').slider('pause');
	$('.slider').slider('next');
}

$('.datepicker').pickadate({
    selectMonths: true, 
    selectYears: 15,     
    today: 'Today',
    clear: 'Clear',    
    close: 'Ok',        
    closeOnSelect: false 
  });

function carrinhoRemoverProduto( idpedido, idproduto, item ) {
    $('#form-remover-produto input[name="pedido_id"]').val(idpedido);
    $('#form-remover-produto input[name="produto_id"]').val(idproduto);
    $('#form-remover-produto input[name="item"]').val(item);
    $('#form-remover-produto').submit();
}
