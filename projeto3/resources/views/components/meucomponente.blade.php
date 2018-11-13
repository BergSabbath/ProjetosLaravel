<div class="alert alert-danger" role="alert"><!--o tipo danger pode ser substituiod por uma variavel definida la no component da pagina blade-->
    <div class="alert-title">{{$titulo}}</div>
    {{$slot}}
    </div>
<div class="alert alert-{{$tipo}}" role="alert"><!--o tipo danger pode ser substituiod por uma variavel definida la no component da pagina blade-->
    <div class="alert-title">{{$titulo}}</div>
    {{$slot}}
    </div>