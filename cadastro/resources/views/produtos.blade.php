@extends('layout.app',['current' => 'produtos'])

@section('body')

        <div class="card border">
            <div class="card-body">
                <h5 class="card-title">Produtos cadastrados</h5>
        @if(isset($prods) > 0)
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="bg-warning">
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Estoque</th>
                            <th>Categoria</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prods as $p)
                        <tr class="table table-warning">
                            <td>{{$p->id}}</td>
                            <td>{{$p->nome}}</td>
                            <td>{{$p->estoque}}</td>
                            <td>{{$p->categoria_id}}</td>
                            <td>{{'R$ '.number_format($p->preco,2,',','.')}}</td>
                            <td>
                                <a href="/produtos/editar/{{$p->id}}" class="btn btn-sm btn-primary">Editar</a>
                                <a href="/produtos/apagar/{{$p->id}}" class="btn btn-sm btn-danger">Apagar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
        @endif
            </div>
            <div class="card-footer">
                <a href="/produtos/novo" class="btn btn-primary">Novo Produto</a>
            </div>
        </div>
    
@endsection