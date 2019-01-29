@extends('layout.meulayout')

@section('minha_secao_produtos')
    

<h1>Loop Foreach - Arrays Associativos</h1>

@foreach ($produtos as $p)
    <p>{{$p['id']}}: {{$p['nome']}}</p>
@endforeach
<hr>
@foreach ($produtos as $p)
    <p>
        {{$p['id']}}: {{$p['nome']}}
        @if ($loop->first) {{-- pegar o primeiro elemento do array --}}
        (primeiro)    
        @endif
        @if ($loop->last) {{-- pegar o último elemento do array --}}
        (ultimo)    
        @endif
        <span class="badge badge-danger">
            {{$loop->index}} / {{$loop->count}} / {{$loop->remaining}}
            {{--para saber a posição de cada item/quantas iterações foi executada(tipo um for)/quanto ainda falta ser executada--}}
        </span>
        <span class="badge badge-success">
                {{$loop->iteration}}/{{$loop->count}}  
                {{--saber o numero real de iterações--}}
            </span> 
    </p>
@endforeach
@endsection

