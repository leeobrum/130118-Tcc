<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pedido;
use App\Produto;
use App\PedidoProduto;
use App\CupomDesconto;

class CarrinhoController extends Controller
{
    public function index()
    {    	
        $pedidos = Pedido::where([
            'status'  => 'RE',
            'user_id' => Auth::user()->id
            ])->get();

        $produtos = Produto::all();

        return view('admin.carrinho.index', compact('pedidos', 'produtos'));
    }

    public function comprar($id)
    {

        $registro = new PedidoProduto();
        $idusuario = Auth::user()->id;
        //$idproduto = Produto::all();            
        $idproduto = Produto::find($id);

        $idpedido = Pedido::consultaId([
            'user_id' => $idusuario,
            'status'  => 'RE' 
            ]);

        if( empty($idpedido) ) {
            $pedido_novo = Pedido::create([
                'user_id' => $idusuario,
                'status'  => 'RE'
                ]);

            $idpedido = $pedido_novo->id;
        }

        $registro->pedido_id = $idpedido;
        $registro->produto_id = $idproduto->id;
        $registro->valor = $idproduto->valor;
        $registro->status = 'RE';
        
        //dd($registro);
        $registro->save();

        \Session::flash('mensagem',['msg'=>'Produto Adicionado no Carrinho!','class'=>'green white-text']);

        return redirect()->route('admin.carrinho');
    }

    public function remover()
    {

        //$this->middleware('VerifyCsrfToken');

        $req = Request();
        $idpedido           = $req->input('pedido_id');
        $idproduto          = $req->input('produto_id');
        $remove_apenas_item = (boolean)$req->input('item');
        $idusuario          = Auth::user()->id;

        $idpedido = Pedido::consultaId([
            'id'      => $idpedido,
            'user_id' => $idusuario,
            'status'  => 'RE' 
            ]);

        if( empty($idpedido) ) {
            \Session::flash('mensagem',['msg'=>'Pedido não encontrado!','class'=>'red white-text']);            
            return redirect()->route('admin.carrinho');
        }

        $where_produto = [
            'pedido_id'  => $idpedido,
            'produto_id' => $idproduto
        ];

        $produto = PedidoProduto::where($where_produto)->orderBy('id', 'desc')->first();
        if( empty($produto->id) ) {
            \Session::flash('mensagem',['msg'=>'Produto não encontrado no carrinho!','class'=>'red white-text']);            
            return redirect()->route('admin.carrinho');
        }

        if( $remove_apenas_item ) {
            $where_produto['id'] = $produto->id;
        }
        PedidoProduto::where($where_produto)->delete();

        $check_pedido = PedidoProduto::where([
            'pedido_id' => $produto->pedido_id
            ])->exists();

        if( !$check_pedido ) {
            Pedido::where([
                'id' => $produto->pedido_id
                ])->delete();
        }

        \Session::flash('mensagem',['msg'=>'Produto removido do carrinho com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.carrinho');
    }

    public function concluir()
    {      

        $req = Request();
        $idpedido  = $req->input('pedido_id');
        $idusuario = Auth::user()->id;

        $check_pedido = Pedido::where([
            'id'      => $idpedido,
            'user_id' => $idusuario,
            'status'  => 'RE' 
            ])->exists();

        if( !$check_pedido ) {
            \Session::flash('mensagem',['msg'=>'Pedido não encontrado!','class'=>'red white-text']); 
            return redirect()->route('admin.carrinho');
        }

        $check_produtos = PedidoProduto::where([
            'pedido_id' => $idpedido
            ])->exists();
        if(!$check_produtos) {
            \Session::flash('mensagem',['msg'=>'Produtos do pedido não encontrados!','class'=>'red white-text']);
            return redirect()->route('admin.carrinho');
        }

        PedidoProduto::where([
            'pedido_id' => $idpedido
            ])->update([
                'status' => 'PA'
            ]);
        Pedido::where([
                'id' => $idpedido
            ])->update([
                'status' => 'PA'
            ]);

       \Session::flash('mensagem',['msg'=>'Compra concluída com sucesso!','class'=>'green white-text']);
    
        return redirect()->route('admin.carrinho.compras');
    }

    public function compras()
    {

        $compras = Pedido::where([
            'status'  => 'PA',
            'user_id' => Auth::user()->id
            ])->orderBy('created_at', 'desc')->get();
        
        $cancelados = Pedido::where([
            'status'  => 'CA',
            'user_id' => Auth::user()->id
            ])->orderBy('updated_at', 'desc')->get();

        return view('admin.carrinho.compras', compact('compras', 'cancelados'));
    }

    public function cancelar()
    {        

        $req = Request();
        $idpedido       = $req->input('pedido_id');
        $idspedido_prod = $req->input('id');
        $idusuario      = Auth::user()->id;

        if( empty($idspedido_prod) ) {
            \Session::flash('mensagem',['msg'=>'Nenhum item selecionado para cancelamento!','class'=>'red white-text']);            
            return redirect()->route('admin.carrinho.compras');
        }

        $check_pedido = Pedido::where([
            'id'      => $idpedido,
            'user_id' => $idusuario,
            'status'  => 'PA' // Pago
            ])->exists();

        if( !$check_pedido ) {
            \Session::flash('mensagem',['msg'=>'Pedido não encontrado para cancelamento!','class'=>'red white-text']);
            
            return redirect()->route('admin.carrinho.compras');
        }

        $check_produtos = PedidoProduto::where([
                'pedido_id' => $idpedido,
                'status'    => 'PA'
            ])->whereIn('id', $idspedido_prod)->exists();

        if( !$check_produtos ) {
            \Session::flash('mensagem',['msg'=>'Produtos do pedido não encontrados!','class'=>'red white-text']);
            
            return redirect()->route('admin.carrinho.compras');
        }

        PedidoProduto::where([
                'pedido_id' => $idpedido,
                'status'    => 'PA'
            ])->whereIn('id', $idspedido_prod)->update([
                'status' => 'CA' //Cancelado
            ]);

        $check_pedido_cancel = PedidoProduto::where([
                'pedido_id' => $idpedido,
                'status'    => 'PA'
            ])->exists();

        if( !$check_pedido_cancel ) {
            Pedido::where([
                'id' => $idpedido
            ])->update([
                'status' => 'CA'
            ]);

            \Session::flash('mensagem',['msg'=>'Compra cancelada com sucesso!','class'=>'green white-text']);            

        } else {
            \Session::flash('mensagem',['msg'=>'Item(ns) da compra cancelado(s) com sucesso!','class'=>'green white-text']);           
        }

        return redirect()->route('admin.carrinho.compras');
    }

    public function desconto()
    {     

        $req = Request();
        $idpedido  = $req->input('pedido_id');
        $cupom     = $req->input('cupom');
        $idusuario = Auth::user()->id;

        if( empty($cupom) ) {
            \Session::flash('mensagem',['msg'=>'Cupom inválido!','class'=>'red white-text']);            
            return redirect()->route('admin.carrinho');
        }

        $cupom = CupomDesconto::where([
            'localizador' => $cupom,
            'ativo'       => 'S'
            ])->where('dthr_validade', '>', date('Y-m-d'))->first();

        if( empty($cupom->id) ) {
            \Session::flash('mensagem',['msg'=>'Cupom de desconto não encontrado!','class'=>'red white-text']);            
            return redirect()->route('admin.carrinho');
        }

        $check_pedido = Pedido::where([
            'id'      => $idpedido,
            'user_id' => $idusuario,
            'status'  => 'RE' // Reservado
            ])->exists();

        if( !$check_pedido ) {
            \Session::flash('mensagem',['msg'=>'Pedido não encontrado para validação!','class'=>'red white-text']);    
            return redirect()->route('admin.carrinho');
        }

        $pedido_produtos = PedidoProduto::where([
                'pedido_id' => $idpedido,
                'status'    => 'RE'
            ])->get();

        if( empty($pedido_produtos) ) {
            \Session::flash('mensagem',['msg'=>'Produtos do pedido não encontrados!','class'=>'red white-text']);            
            return redirect()->route('admin.carrinho');
        }

        $aplicou_desconto = false;
        foreach ($pedido_produtos as $pedido_produto) {

            switch ($cupom->modo_desconto) {
                case 'porc':
                    $valor_desconto = ( $pedido_produto->valor * $cupom->desconto ) / 100;
                    break;

                default:
                    $valor_desconto = $cupom->desconto;
                    break;
            }

            $valor_desconto = ($valor_desconto > $pedido_produto->valor) ? $pedido_produto->valor : number_format($valor_desconto, 2);

            switch ($cupom->modo_limite) {
                case 'qtd':
                    $qtd_pedido = PedidoProduto::whereIn('status', ['PA', 'RE'])->where([
                            'cupom_desconto_id' => $cupom->id
                        ])->count();

                    if( $qtd_pedido >= $cupom->limite ) {
                        continue;
                    }
                    break;

                default:
                    $valor_ckc_descontos = PedidoProduto::whereIn('status', ['PA', 'RE'])->where([
                            'cupom_desconto_id' => $cupom->id
                        ])->sum('desconto');

                    if( ($valor_ckc_descontos+$valor_desconto) > $cupom->limite ) {
                        continue;
                    }
                    break;
            }

            $pedido_produto->cupom_desconto_id = $cupom->id;
            $pedido_produto->desconto          = $valor_desconto;
            $pedido_produto->update();

            $aplicou_desconto = true;

        }

        if( $aplicou_desconto ) {
            \Session::flash('mensagem',['msg'=>'Cupom aplicado com sucesso!','class'=>'green white-text']);            
        } else {
            \Session::flash('mensagem',['msg'=>'Cupom esgotado!','class'=>'red white-text']);            
        }
        return redirect()->route('admin.carrinho');
    }

}
