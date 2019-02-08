@extends('layout.app',['current' => 'produtos'])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/produtos" method="POST">
            @csrf
                <div class="form-group">
                    <div>
                        <label for="nomeCategoria">Nome da categoria</label><br>
                        <select name="nomeCategoria">
                            @foreach($cats as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                            @endforeach
                        </select><br>
                        <label for="nomeProduto">Nome do Produto</label>
                        <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="Produto">
                    <br>
                        <Label for="nomeEstoque">Quantidade em Estoque</Label>
                        <input type="text" class="form-control" name="nomeEstoque" id="nomeEstoque" placeholder="quantidade">
                    <br>
                        <Label for="nomePreco">Preço</Label>
                        <input type="text" class="form-control" name="nomePreco" id="nomePreco" placeholder="R$ 0,00">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="reset" class="btn btn-danger btn-sm">Cancelar</button>
        </form>
    </div>
</div>
@endsection