<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <link href="{{asset('css/app.css')}}" rel="stylesheet" >
        <title>Paginação</title>
        <style>
        body {
            padding: 20px;
        }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="card text-center">
                <div class="card-header bg-warning">
                    <b> Tabela de Clientes</b>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Exibindo {{$clientes->count()}} de {{$clientes->total()}}
                        clientes ({{$clientes->firstItem()}} a {{$clientes->lastItem()}})</h5>
                    <table class="table table-hover table-bordered">
                        <thead class="table-primary">
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Sobre</th>
                            <th scope="col">E-mail</th>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                            <tr class="table-info">
                                <td>{{$cliente->id}}</td>
                                <td>{{$cliente->nome}}</td>
                                <td>{{$cliente->sobrenome}}</td>
                                <td>{{$cliente->email}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"> {{$clientes->links()}}</div>
            </div>
        </div>
        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    </body>
</html>
