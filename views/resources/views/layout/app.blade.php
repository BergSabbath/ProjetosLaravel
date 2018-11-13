<!DOCTYPE html>
<html>
<head>
    <title>Meu Titulo - @yield('titulo')</title>
</head>
<body>
    @section('barralateral')
        <p>Esta parte da seçao é do template PAI</p>
    @show
    <div>
    @yield('conteudo')
    </div>
    
</body>
</html>