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
                    <div class="card border">
                        <div class="card-header">
                            <div class="card-title">
                                Cadastro de Cliente
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover" id="tabelaProdutos">
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
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </main>
        

        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    </body>
    </html>