<x-layout>

<x-masthead title="Articolo con id {{$article->id}}"></x-masthead>

<div class="containr">
    <div class="row my-5">
        {{-- @dd($products) --}}       
        <div class="col-12 col-md-4">   
        <div class="card" style="width: 18rem;">
  <img src="{{Storage::url($article->img)}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$article->title}}</h5>
    <p class="card-subtitle">{{$article->subtitle}}</p>
    <p class="card-text">{{$article->body}}</p>
    <a href="{{route('article.show', compact('article') )}}" class="btn btn-primary">Dettaglio Articolo</a>
  </div>
</div>
        </div>        
    </div>
</div>

</x-layout>