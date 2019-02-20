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
                    <h5 class="card-title">
                    </h5>
                    <table class="table table-hover table-bordered" id="tabelaClientes">
                        <thead class="table-primary">
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Sobre</th>
                            <th scope="col">E-mail</th>
                        </thead>
                        <tbody>
                            <tr class="table-info">
                                <td>1</td>
                                <td>marcelo</td>
                                <td>teodor</td>
                                <td>parara@gmail</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <nav id="paginator">
                        <ul class="pagination">
                        {{-- <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Próxima</a>
                            </li> --}}
                        </ul> 
                    </nav>
                </div>
            </div>
        </div>
        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>

        <script type="text/javascript">

        function getItemProximo(data) {
            if (data.last_page == data.current_page)
                s = '<li class="page-item disabled">';
            else 
                s = '<li class="page-item">';
            s += '<a class="page-link" href="#">Próximo</a></li>';
            return s;  
        }

        function getItemAnterior(data) {
            if (1 == data.current_page)
                s = '<li class="page-item disabled">';
            else 
                s = '<li class="page-item">';
            s += '<a class="page-link" href="#">Anterior</a></li>';
            return s;  
        }

        function getItem(data, i) {
            if (i == data.current_page)
                s = '<li class="page-item active">';
            else 
                s = '<li class="page-item">';
            s += '<a class="page-link" href="#">'+ i +'</a></li>';
            return s;  
        }

        function montarPaginator(data) {
            $("#paginator>ul>li").remove();
            $("#paginator>ul").append(getItemAnterior(data))
            
            inicio=1;
            fim=10;
            for(i=inicio;i<=fim;i++) {
                s = getItem(data,i);
                $("#paginator>ul").append(s);
            }
            $("#paginator>ul").append(getItemProximo(data));

        }

        function montarLinha(cliente) {
            return  '<tr>' +
                        '<td>' + cliente.id + '</td>' +
                        '<td>' + cliente.nome + '</td>' +
                        '<td>' + cliente.sobrenome + '</td>' +
                        '<td>' + cliente.email + '</td>'+
                    '</tr>';
        }   

        function montarTabela(data) {
            $("#tabelaClientes>tbody>tr").remove();
            for (i=0 ; i<data.data.length; i++) {
                s = montarLinha(data.data[i]);
                $("#tabelaClientes>tbody").append(s);

            }
        }
        
        function carregarClientes(pagina)
        {    
            $.get('/json', {page: pagina}, function(resp) 
            {
                console.log(resp);
                montarTabela(resp);
                montarPaginator(resp);
            });
        }

            $(function(){
                carregarClientes(8);
            });
        </script>
    </body>
</html>
