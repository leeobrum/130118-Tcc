<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/materialize/dist/css/materialize.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    <title>Laravel</title>

    
</head>
<body id="app-layout">
  <header>
    @include('layouts._site._nav')
  </header>
  <main>
    @yield('content')
  </main>  


<footer class="page-footer green" >
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Madeira / Aluminio</h5>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Links</h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="{{ route('site.home') }}">Home</a></li>
          <li><a class="grey-text text-lighten-3" href="{{ route('site.sobre') }}">Sobre</a></li>
          <li><a class="grey-text text-lighten-3" href="{{ route('site.contato') }}">Contato</a></li>
          
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
    © 2017 Madeireira Brum
    <a class="grey-text text-lighten-4 right" href="#!">LeonardoBrum</a>
    </div>
  </div>
</footer>
            

    <script src="{{asset('lib/jquery/dist/jquery.js')}}"></script>
    <script src="{{asset('lib/materialize/dist/js/materialize.js')}}"></script>

    <script src="{{asset('js/init.js')}}"></script>
</body>
</html>
