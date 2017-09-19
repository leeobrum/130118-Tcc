<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/materialize/dist/css/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

      @include('layouts._admin._nav')
      <main>
        @yield('content')
      </main>      

    <footer class="page-footer green">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Madeireira Brum</h5>          
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Link</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="{{route('site.home')}}">Site</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        © 2017 Madeireira Brum
        </div>
      </div>
    </footer>

    <!-- Scripts -->
    <script src="{{asset('lib/jquery/dist/jquery.js')}}"></script>
    <script src="{{asset('lib/materialize/dist/js/materialize.js')}}"></script>
    <script src="{{asset('js/init.js')}}"></script>
</body>
</html>
