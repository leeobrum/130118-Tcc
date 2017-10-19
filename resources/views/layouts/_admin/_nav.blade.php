<nav>
    <div class="nav-wrapper green">
        <div class="container">
          <a href="{{route('admin.principal')}}" class="brand-logo">SisAdmin</a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="{{route('admin.principal')}}">Inicio</a></li>
            <li><a target="_blank" href="{{route('site.home')}}">Site</a></li>
            @if(Auth::guest())
            <li><a href="{{route('admin.login')}}">Login</a></li>
            @else
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>

            <ul id="dropdown1" class="dropdown-content">
              <li><a href="#!">{{ Auth::user()->name }}</a></li>
              <li><a href="{{route('admin.produtos')}}">Produtos</a>
              <li><a href="{{route('admin.tipos')}}">Tipos</a>
              <li><a href="{{route('admin.cupom_descontos')}}">Cupom de Desconto</a>
              <li><a href="{{route('admin.usuarios')}}">Usuários</a></li>
              <li><a href="{{route('admin.paginas')}}">Páginas</a></li>
            </ul>

            <li><a href="{{route('admin.login.sair')}}">Sair</a></li>            
            @endif
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <li><a href="{{route('admin.principal')}}">Inicio</a></li>
            <li><a target="_blank" href="{{route('site.home')}}">Site</a></li>
            @if(Auth::guest())
            <li><a href="{{route('admin.login')}}">Login</a></li>
            @else
            <li><a href="#">{{ Auth::user()->name }}</a></li>
            <li><a href="{{route('admin.produtos')}}">Produtos</a>
            <li><a href="{{route('admin.tipos')}}">Tipos</a>      
            <li><a href="{{route('admin.cupom_descontos')}}">Cupom de Desconto</a>      
            <li><a href="{{route('admin.usuarios')}}">Usuários</a></li>
            <li><a href="{{route('admin.paginas')}}">Páginas</a></li>
            <li><a href="{{route('admin.login.sair')}}">Sair</a></li> 
            @endif
          </ul>
          </div>
    </div>
</nav>