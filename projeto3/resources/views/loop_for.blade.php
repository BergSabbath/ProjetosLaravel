@extends('layout.meulayout')


@section('minha_secao_produtos')
<h1>Loops</h1>

@for($i=0;$i<$n;$i++)
    <p>Loops em laravel {{$i}}</p>
@endfor

@endsection