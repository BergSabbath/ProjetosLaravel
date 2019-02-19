@extends('layout.meulayout')
@section('minha_secao_produtos')
    você escolheu a opção:
    @if (isset($opcao))
        @switch($opcao)
            @case(1)
                <h1 class="badge badge-primary">Você escolheu a opção 1 (azul)</h1>
                @break
            @case(2)
                <h2 class="badge badge-danger">Você escolheu a opção 2 (vermelho)</h2> 
                @break
            @case(3)
                <h2 class="badge badge-success">Você escolheu a opção 3 (verde)</h2> 
                @break
            @case(4)
                <h2 class="badge badge-warning">Você escolheu a opção 4 (amarelo)</h2> 
                @break
            @case(5)
                <h2 class="badge badge-dark">Você escolheu a opção 5 (preto)</h2> 
                @break
            @default
                <p>Você não escolheu uma opção válida</p>
        @endswitch
    @endif
@endsection

