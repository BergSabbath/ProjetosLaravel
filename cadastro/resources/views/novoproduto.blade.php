@extends('layout.app', ["current"=>"produtos"])
@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/produtos" method="POST">
        @csrf

        <label for="Categoria" id="Categoria" name="Categoria">Selecione a Categoria</label> <br>
            <select name="Categoria"> 
        @foreach($nov as $cat)
                <option value="{{$cat->id}}">{{$cat->nome}}</option>
        @endforeach
            </select>
        <br><br>
            <div class="form-group">
                <label for="nomeProduto">Nome do Produto</label>
                <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="Produto">
                <label for="nomeEstoque">Quantidade em estoque</label>
                <input type="number" class="form-control" name="nomeEstoque" id="nomeEstoque" placeholder="Estoque">
                <label for="nomePreco">Preço</label>
                <input type="number" step="0.01" class="form-control" name="nomePreco" id="nomePreco" placeholder="Preço">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="reset" class="btn btn-danger btn-sm">Cancelar</button>
        </form>
    </div>
</div>
@endsection