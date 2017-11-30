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

function optionCheck(){
    var option = document.getElementById("options").value;

    if(option == ""){
        document.getElementById("dd").style ="display:none;";
    }
    if(option == "Rcupom_desconto"){
        document.getElementById("btn").style.visibility ="visible";        
        document.getElementById("dd").style ="display:none;"; 
    } 
    if(option == "produto_status"){
        document.getElementById("dd").style ="";
    }
}

function verValor(){
    var option = document.getElementById("options").value;
    var status = document.getElementById("status").value;

    if(option == "Rcupom_desconto"){
        window.location.href = "/admin/relatorios/Rcupom_desconto"            
    }
    if(option == "produto_status"){
        if(status == "RE"){
            window.location.href = "/admin/relatorios/produto_status/RE"
        }
        if(status == "PA"){
            window.location.href = "/admin/relatorios/produto_status/PA"
        }
        if(status == "CA"){
            window.location.href = "/admin/relatorios/produto_status/CA"
        }
    }
}

function carrinhoRemoverProduto( idpedido, idproduto, item ) {
    $('#form-remover-produto input[name="pedido_id"]').val(idpedido);
    $('#form-remover-produto input[name="produto_id"]').val(idproduto);
    $('#form-remover-produto input[name="item"]').val(item);
    $('#form-remover-produto').submit();
}
