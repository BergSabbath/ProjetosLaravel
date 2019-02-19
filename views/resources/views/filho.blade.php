@extends('layout.app')

@section('titulo', 'Minha pagina - filho')

@section('barralateral')
    @parent
    <p>Essa parte é do FILHO</p>
@endsection

@section('conteudo')
    <p>Este é o conteudo do filho</p>
@endsection<!-- section apenas define a seção .. em algum momento o yield fara aparecer-->