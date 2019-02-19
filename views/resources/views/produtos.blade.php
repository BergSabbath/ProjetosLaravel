<html>
    <head>
        <title></title>
    <link  href="{{asset('css/app.css')}}" rel="stylesheet">
    </head>
    <body>
        @if(isset($produtos))

            @if(count($produtos) == 0)
                <h1>Nenhum produto</h1>
            @elseif (count($produtos)=== 1)
                <h1>Um produto</h1>
            @else
                <h1>Temos vários produtos</h1>
            @endif

            @foreach ($produtos as $p)
                <p>Nome: {{$p}}</p>
            @endforeach
            
        @else
            <h2>Variavel produtos não foi passada como parametro</h2>
        @endif

        @empty($prod)
        <h2>Nada em prod</h2>
        @endempty


    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    </body>
</html>