@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	<h3>Produtos no Carrinho</h3>
	<nav>
	    <div class="nav-wrapper teal lighten-1">
	      <div class="col s12">
	        <a href="{{route('site.home')}}" class="breadcrumb">Continuar Comprando</a>
	        <a class="breadcrumb">Produtos no Carrinho</a>	        
	      </div>
	    </div>
  	</nav>
	</div>
	<div class="row">
        <hr/>
        @forelse ($pedidos as $pedido)
            <h5 class="col l6 s12 m6"> Pedido: {{ $pedido->id }} </h5>
            <h5 class="col l6 s12 m6"> Criado em: {{ $pedido->created_at->format('d/m/Y - H:i') }} </h5>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th class="center-align">Qtd</th>
                        <th>Produto</th>
                        <th>Valor Unit.</th>
                        <th>Desconto(s)</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total_pedido = 0;
                    @endphp                    
                    @foreach ($pedido->pedido_produtos as $pedido_produto)                    
                    <tr>
                        <td>
                            <img width="100" height="100" src="{{ asset($pedido_produto->produto->imagem) }}"> 
                        </td>
                        <td class="center-align">
                            <div class="center-align">
                                <a class="col 14 m4 s4" onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 1 )">
                                    <button class="material-icons small" style="font-size:23px">remove_circle_outline</button>
                                </a>                                
                                <span class="col l4 m4 s4"> {{ $pedido_produto->qtd }} </span>

                                <form action="{{ route('admin.carrinho.comprar',  $pedido_produto->produto->id) }}" method="post">
                                    {{csrf_field()}}

                                    <button class="material-icons small" style="font-size:23px;color:red">add_circle_outline</button>
                                </form>
                                                                                                                                        
                            </div>                            
                            <a href="#" onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 0)" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Retirar produto do carrinho?">Retirar produto</a>
                        </td>                        
                        <td> {{ $pedido_produto->produto->nome }} </td>
                        <td>R$ {{ number_format($pedido_produto->produto->valor, 2, ',', '.') }}</td>
                        <td>R$ {{ number_format($pedido_produto->descontos, 2, ',', '.') }}</td>
                        @php
                            $total_produto = $pedido_produto->valores - $pedido_produto->descontos;
                            $total_pedido += $total_produto;
                        @endphp
                        <td>R$ {{ number_format($total_produto, 2, ',', '.') }}</td>
                    </tr>                    
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <strong class="col offset-l6 offset-m6 offset-s6 l4 m4 s4 right-align">Total do pedido: </strong>
                <span class="col l2 m2 s2">R$ {{ number_format($total_pedido, 2, ',', '.') }}</span>
            </div>
            <div class="row">
                <form method="post" action="{{ route('admin.carrinho.desconto') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                    <strong class="col s4 m4 l3 offset-l4 right-align">Cupom de desconto: </strong>
                    <input class="col s6 m6 l3" type="text" name="cupom">
                    <button class="btn-flat btn-large col s2 m2 l2">Validar</button>
                </form>
            </div>
            <div class="row">
                <a class="btn-large tooltipped col l4 s4 m4 offset-l2 offset-s2 offset-m2" data-position="top" data-delay="50" data-tooltip="Voltar a página inicial para continuar comprando?" href="{{ route('site.home') }}">Continuar comprando</a>
                <form method="post" action="{{ route('admin.carrinho.concluir') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                    <button type="submit" class="btn-large blue col offset-l1 offset-s1 offset-m1 l5 s5 m5 tooltipped" data-position="top" data-delay="50" data-tooltip="Adquirir os produtos concluindo a compra?">
                        Concluir compra
                    </button>   
                </form>
            </div>
        @empty
            <h5>Não há nenhum pedido no carrinho</h5>
        @endforelse
	</div>
</div>
<form id="form-remover-produto" method="post" action="{{ route('admin.carrinho.remover') }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <input type="hidden" name="pedido_id">
    <input type="hidden" name="produto_id">
    <input type="hidden" name="item">
</form>

@push('scripts')
    <script type="text/javascript" src="/js/init.js"></script>
@endpush
@endsection