@extends('layout.app', ["current"=>"produtos"])
@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/produtos/{{$prod->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeProduto">Nome do Produto</label>
                <input type="text" class="form-control" name="nomeProduto" value="{{$prod->nome}}" id="nomeProduto" placeholder="Produto">
            </div>
            <div class="form-group">
                <label for="estoqueProduto">Quantidade em Estoque</label>
                <input type="text" class="form-control" name="estoqueProduto" value="{{$prod->estoque}}" id="estoqueProduto" placeholder="Quantidade em estoque">
            </div>
            <div class="form-group">
                <label for="precoProduto">Preço</label>
                <input type="text" class="form-control" name="precoProduto" value="{{$prod->preco}}" id="precoProduto" placeholder="Preço">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="reset" class="btn btn-danger btn-sm">Cancelar</button>
        </form>
    </div>
</div>
@endsection