<html></html>
    <head>
        <title>Meu titulo - @yield('titulo')</title>
    </head>
    <body>
        @section('barralateral')
            Esta parte da seção é do template PAI
        @show<!--diferente do endsection... o 'show' ja mostra a section -->
        <div>
            @yield('conteudo')
        </div>
    </body>
</html>