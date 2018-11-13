<!DOCTYPE html>
<html>
<head>
    <link href="{{URL::to('css/app.css')}}" rel="stylesheet"/>
    <!-- <link href="{{asset('css/app.css')}}" rel="stylesheet"/> faz o mesmo que o comando abaixo--> 
</head>
<body> 

    @hasSection('minha_secao_produtos')<!--Se existe a seção.. montará o card-->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title" style="width:500px; margin:10px;">Produtos</h5>
            <p class="card-text">
                @yield ('minha_secao_produtos')
            </p>
            <a href="#" class="card-link">Informações</a>
            <a href="#" class="card-link">Ajuda</a>
        </div>
    </div>
    @endif<!--FINALIZA O hasSection com endif-->
    

    <script src="{{asset('js/app.js')}}" type="text/javascript"/></script>
    <!-- <script src="{{URL::to('js/app.js')}}" type="text/javascript"/></script> serve para o mesmo comando abaixo -->
    
</body>
</html>