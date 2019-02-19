@auth {{-- seção para quem está logado! --}}
    Você está logado!!
    <p>{{ Auth::user()->name }}</p>
    <p>{{ Auth::user()->email }}</p>
    <p>{{ Auth::user()->id }}</p>
@endauth

@guest
    <h3>Você não está logado!! </h3>   
@endguest