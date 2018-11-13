<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <link href="{{URL::to('css/app.css')}}" rel="stylesheet"/>
    <!-- <link href="{{asset('css/app.css')}}" rel="stylesheet"/> faz o mesmo que o comando abaixo--> 
</head>
<body> 
    @component('components.meucomponente')<!--components.meucomponete  é o caminho onde se encontra a blade
        <strong>ERRO: </strong> Sua Mensagem de erro!!  <!-- tudo aki vira $slot-->
        @slot('titulo')<!-- cria uma variavel para ser colocada no componente -->
            Erro fatal
        @endslot
        @slot('tipo')<!-- cria uma variavel para ser colocada no componente -->
            primary
        @endslot
    @endcomponent
    
    @component('components.meucomponente', ['tipo'=>'primary', 'titulo'=>'Erro Fatal'])<!--array associativo-->
        <strong>ERRO: </strong> Sua Mensagem de erro (utilizando array associativo)!!  <!-- tudo aki vira $slot-->  
    @endcomponent

    <!--o comando alerta foi definido no AppServiceProvider.php, refere-se ao comando anterior.. uma forma de atalho -->
    @alerta(['tipo'=>'primary', 'titulo'=>'Erro Fatal'])
    <strong>ERRO: </strong> Sua Mensagem de erro (utilizando o alerta)!!
    @endalerta

    @alerta(['tipo'=>'secondary', 'titulo'=>'Erro Fatal'])
    <strong>ERRO: </strong> Sua Mensagem de erro (utilizando o alerta)!!
    @endalerta

    @alerta(['tipo'=>'success', 'titulo'=>'Erro Fatal'])
    <strong>ERRO: </strong> Sua Mensagem de erro (utilizando o alerta)!!
    @endalerta

    @alerta(['tipo'=>'warning', 'titulo'=>'Erro Fatal'])
    <strong>ERRO: </strong> Sua Mensagem de erro (utilizando o alerta)!!
    @endalerta

    @alerta(['tipo'=>'info', 'titulo'=>'Erro Fatal'])
    <strong>ERRO: </strong> Sua Mensagem de erro (utilizando o alerta)!!
    @endalerta

    @alerta(['tipo'=>'light', 'titulo'=>'Erro Fatal'])
    <strong>ERRO: </strong> Sua Mensagem de erro (utilizando o alerta)!!
    @endalerta

    @alerta(['tipo'=>'dark', 'titulo'=>'Erro Fatal'])
    <strong>ERRO: </strong> Sua Mensagem de erro (utilizando o alerta)!!
    @endalerta


    <script src="{{asset('js/app.js')}}" type="text/javascript"/></script>
    <!-- <script src="{{URL::to('js/app.js')}}" type="text/javascript"/></script> serve para o mesmo comando abaixo -->
    
</body>
</html>