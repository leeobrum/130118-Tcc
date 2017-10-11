@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row section">
        <h4 align="center">Detalhe do Produto</h4>
        <div class="divider"></div>
    </div>
    <div class="row section">
        <div class="col s12 m8">
            @if($produto->galeria()->count())
            <div class="row">
                <div class="slider">
                    <ul class="slides">
                    @foreach($galeria as $imagem)
                        <li>
                            <img src="{{ asset($imagem->imagem) }}">
                            <div class="caption {{ $direcaoImagem[rand(0,2)] }}">
                                <h3>{{ $imagem->titulo }}</h3>
                                <h5>{{ $imagem->descricao }}</h5>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="row" align="center">
                <button onclick="sliderPrev()" class="btn blue">Anterior</button>
                <button onclick="sliderNext()" class="btn blue">Próxima</button>
            </div>
            @else
            <img class="responsive-img" src="{{ asset($produto->imagem) }}">
            @endif
        </div>
        <div class="col s12 m4">
            <h4>{{ $produto->nome }}</h4>
            <blockquote>{{ $produto->descricao }}</blockquote>
            <p><b>Código:</b> {{ $produto->id }}</p>
            <p><b>Tipo:</b> {{ $produto->tipo->titulo }}</p>
            <p><b>Valor:</b>R$ {{ number_format($produto->valor,2,",",".") }}</p>
            <a class="btn deep-orange darken-1" href="{{ route('site.contato') }}">Comprar</a>
        </div>
    </div>
</div>
@endsection