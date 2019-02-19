<html>
    <head>
        <title>Cadastro de cliente</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <style>
            body {
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <main role="main">
            <div class="row">
                <div class="container col-md-8 offset-md-2">
                    <div class="card border-dark">
                        <div class="card-header bg-dark text-white">
                            <div class="card-title">
                                <h3>Cadastro de Cliente</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-info table-hover" id="tabelaProdutos">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th>Endereço</th>
                                        <th>Idade</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $c )
                                    <tr>
                                        <td>{{$c->id}}</td>
                                        <td>{{$c->nome}}</td>
                                        <td>{{$c->endereco}}</td>
                                        <td>{{$c->idade}}</td>
                                        <td>{{$c->email}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-success" href="/novocliente">Novo Cliente</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </main>
        

        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    </body>
    </html>