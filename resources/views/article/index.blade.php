<x-layout>
<header class="header">

<div class="container h-100">
    <div class="row justify-content-center align-content-center h-100">
        <div class="col-12 col-md-6 d-flex justify-content-center">
            <h1 class="text-center">I miei articoli</h1>

        </div>
    </div>
</div>
</header>

<x-display-message/>

<div class="containr">
    <div class="row my-5">
        {{-- @dd($products) --}}
        @foreach($articles as $article)
        <div class="col-12 col-md-4">   
        <div class="card" style="width: 18rem;">
  <img src="{{Storage::url($article->img)}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$article->title}}</h5>
    <p class="card-subtitle">{{$article->subtitle}}</p>
    <p class="card-text">{{$article->body}}</p>
    <a href="{{route('article.show', compact('article') )}}" class="btn btn-primary">Dettaglio Articolo</a>
    <a href="{{route('article.edit', compact('article') )}}" class="btn btn-warning">Modifica articolo</a>

    <form
    action="{{route('article.destroy', compact('article') )}}"
    method="POST" 
    >
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" type="submit">Elimina articolo</button>
   
    </form>
  </div>
</div>
        </div>
        @endforeach
    </div>
</div>

</x-layout>