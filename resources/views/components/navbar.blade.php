<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
        <a class="nav-link" href="{{route('product.index')}}">I miei prodotti</a>  
        
  
      {{-- Se l'utente non è autenticato --}}  
      {{-- l'oggetto per definizione e true --}}

      @auth
      <a class="nav-link" href="{{route('product.create')}}">Crea Prodotto</a>   
      {{-- Sarà vidibile solo se l'utente è autenticato --}}
      @endauth

      @guest 
      {{-- Sarà vidibile solo se l'utente NON è autenticato --}}
      @endguest  

      @guest
        <a class="nav-link" href="{{route('register')}}">Registrati</a> 
        <a class="nav-link" href="{{route('login')}}">Accedi</a>
      @endguest  

      @auth 
      <a class="nav-link" href="#">Benvenuto {{Auth::user()->name}}</a>
      <form 
        action="{{route('logout')}}" 
        method="POST">
        @csrf
       <button 4
       class="nav-link" 
       type="submit">Logout</button>
        </form> 
      @endauth

      </div>
    </div>
  </div>
</nav>