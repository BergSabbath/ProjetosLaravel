@extends('layout.app', ['current' => 'categorias'])

@section('body')

<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Categorias cadastradas</h5>

    @if(count($cats) > 0)
        <table class="table table-bordered  table-hover">
            <thead>
                <tr class=" table table-warning">
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>   
            </thead>
            <tbody>
                @foreach ($cats as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->nome}}</td>
                    <td>
                    <a href="/categorias/editar/{{$c->id}}" class="btn btn-sm btn-primary">Editar</a>
                    <a href="/categorias/apagar/{{$c->id}}" class="btn btn-sm btn-danger">Apagar</a>
                </td>
                </tr> 
                @endforeach
            </tbody>
        </table>
    @endif
    </div>
    <div class="card-footer">
        <a href="/categorias/novo" class="btn btn-sm btn-primary" role="button">Nova Categoria</a>
    </div>
</div>

@endsection
