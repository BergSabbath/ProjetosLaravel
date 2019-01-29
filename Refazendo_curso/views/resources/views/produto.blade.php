<html>
    <head>
        <title></title>
    <link  href="{{asset('css/app.css')}}" rel="stylesheet">
    </head>
    <body>
        @if(isset($produtos))
            <h1>Temos produtos</h1>
        @else
            <h2>Variavel produtos não foi passada como parametro</h2>

        @endif


    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    </body>
</html>