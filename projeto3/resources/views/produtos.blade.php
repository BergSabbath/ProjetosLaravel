<!DOCTYPE html>
<html>
<head>
    <link href="{{URL::to('css/app.css')}}" rel="stylesheet"/>
    <!-- <link href="{{asset('css/app.css')}}" rel="stylesheet"/> faz o mesmo que o comando abaixo--> 
</head>
<body> 

    @if(isset($produtos))
        
        @if(count($produtos) == 0)
            <h1>Nenhum produto</h1>
        @elseif (count ($produtos)=== 1)
            <h1>Um produto</h1>
        @else
            <h1>Temos vários produtos</h1>
        @endif

        @foreach($produtos as $p)
            <p>Nome: {{$p}}</p>
        @endforeach

    @else
        <h2>Variável produtos não foi passada como parametros</h2>
    @endif

    @empty($produtos)
        <h2>Nada em produtos</h2>
    @endempty

    <script src="{{asset('js/app.js')}}" type="text/javascript"/></script>
    <!-- <script src="{{URL::to('js/app.js')}}" type="text/javascript"/></script> serve para o mesmo comando abaixo -->
    
</body>
</html>