<html>
    <head>
        <title></title>
        {{-- asset significa URL::to --}}
    <link  href="{{asset('css/app.css')}}" rel="stylesheet">
    {{-- <link  href="{{URL::to('css/app.css')}}" rel="stylesheet"> --}}
    </head>
    <body>
        {{-- Para customização de chamadas de componentes
            deve ir no caminho app/providers/AppServiceProvider
            tem que adicionar o caminho: use Illuminate\Support\Facades\Blade;  //blade pq eh sintaxe blade
            colocar na function Boot "(vamos customizar o components)"
            Blade::component('components.meucomponente,'alerta')
            
            agora ao inves de chamar o @component('component.meucomponente').. 
            basta chamar o dado, ou seja, @alerta 
            ex: 
            @alerta(['tipo' => 'primary','titulo' => 'estudando'])
            @endalerta
            --}}

        @component('components.meucomponente')
            <p>vamos aprender?</p><!-- tudo que for passado dentro do components será chamado de slot -->
            
            @slot('titulo')
                estudando
            @endslot    
            
            @slot('tipo')
                primary
            @endslot 
            
        @endcomponent
    {{-- @component('components.meucomponente', ['tipo' => 'primary','titulo' => 'estudando'])
            <p>vamos aprender?</p><!-- tudo que for passado dentro do components será chamado de slot -->
    @endcomponent --}}
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    </body>
</html>