
<!-- Método para verificar se o usuário está logado utilizando o template blade (view
)-->


@auth
<h4>Você está logado!</h4>
<p>{{Auth::user()->name}}</p>
<p>{{Auth::user()->email}}</p>
<p>{{Auth::user()->id}}</p>
@endauth

<!-- é utilizado para quando o usuário não está logado -->
@guest
    <h4>Você NÂO está logado!!</h4>
@endguest