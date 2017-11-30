@extends('layouts.app')

@section('content')

<div class="container">	
	<div class="row">
    @can('produto_listar')
      <div class="col s12 m4">
        <div class="card teal lighten-1">
          <div class="card-content white-text">
            <span class="card-title">Produtos</span>
            <p>Lista de Produtos</p>
          </div>
          <div class="card-action">
            <a class="white-text" href="{{route('admin.produtos')}}">Acessar</a>
          </div>
        </div>
      </div>
    @endcan
    @can('tipo_listar')
      <div class="col s12 m4">
        <div class="card blue darken-1">
          <div class="card-content white-text">
            <span class="card-title">Tipos</span>
            <p>Lista de tipos</p>
          </div>
          <div class="card-action">
            <a class="white-text" href="{{route('admin.tipos')}}">Acessar</a>
          </div>
        </div>
      </div>
    @endcan
    @can('usuario_listar')
      <div class="col s12 m4">
        <div class="card deep-orange">
          <div class="card-content white-text">
            <span class="card-title">Usuários</span>
            <p>Lista de usuários</p>
          </div>
          <div class="card-action">
            <a class="white-text" href="{{route('admin.usuarios')}}">Acessar</a>
          </div>
        </div>
      </div>
    @endcan     
	</div>
	<div class="row">
		<div class="col s12 m4">
          <div class="card deep-purple ">
            <div class="card-content white-text">
              <span class="card-title">Carrinho</span>
              <p>Carrinho de Compras</p>
            </div>
            <div class="card-action">
              <a class="white-text" href="{{route('admin.carrinho')}}">Acessar</a>
            </div>
          </div>
        </div>
		  <div class="col s12 m4">
        <div class="card orange darken-1">
          <div class="card-content white-text">
            <span class="card-title">Minhas Compras</span>
              <p>Lista de Compras</p>
            </div>
            <div class="card-action">
              <a class="white-text" href="{{route('admin.carrinho.compras')}}">Acessar</a>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
        <div class="card red darken-1">
          <div class="card-content white-text">
             <span class="card-title">Relatórios</span>
             <p>Gerar Relatórios</p>
           </div>
           <div class="card-action">
             <a class="white-text" href="{{route('admin.relatorios')}}">Acessar</a>
           </div>
         </div>
       </div>
	</div>  
	<div class="row">
    @can('papel_listar')
	    <div class="col s12 m4">
        <div class="card red darken-1">
          <div class="card-content white-text">
            <span class="card-title">Papel</span>
            <p>Lista de papéis</p>
          </div>
          <div class="card-action">
            <a class="white-text" href="{{route('admin.papel')}}">Acessar</a>
          </div>
        </div>
     </div>
    @endcan 
    @can('pagina_listar')   
      <div class="col s12 m4">
        <div class="card teal lighten-1">
          <div class="card-content white-text">
            <span class="card-title">Páginas</span>
            <p>Lista de páginas</p>
          </div>
          <div class="card-action">
            <a class="white-text" href="{{route('admin.paginas')}}">Acessar</a>
          </div>
        </div>
      </div> 
    @endcan
    @can('cupom_desconto_listar')       	
		  <div class="col s12 m4">
          <div class="card deep-orange">
            <div class="card-content white-text">
              <span class="card-title">Cupom de Desconto</span>
              <p>Lista de Cupons de Desconto</p>
            </div>
            <div class="card-action">
              <a class="white-text" href="{{route('admin.cupom_descontos')}}">Acessar</a>
            </div>
          </div>
        </div> 
      </div>
    @endcan
</div>
@endsection