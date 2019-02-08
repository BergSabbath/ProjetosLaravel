@extends('layout.app',['current' => 'produtos'])

@section('body')

        <div class="card border">
            <div class="card-body">
                <h5 class="card-title">Produtos cadastrados</h5>
        {{-- @if(isset($prods)) --}}
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class=" table table-warning">
                            <th>Categoria</th>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Estoque</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prods as $p)
                        <tr>
                            <td>{{$cats->id}}</td>
                            <td>{{$p->id}}</td>
                            <td>{{$P->nome}}</td>
                            <td>{{$p->estoque}}</td>
                            <td>{{$p->preco}}</td>
                            <td>
                                <a href="/produtos/editar/{{$p->id}}" class="btn btn-sm btn-primary">Editar</a>
                                <a href="/produtos/apagar/{{$p->id}}" class="btn btn-sm btn-danger">Apagar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        {{-- @endif --}}
            </div>
        </div>
    
@endsection