<x-layout>
 

<x-masthead title="Modifica articolo : {{$article->title}}"></x-masthead>

<x-display-message/>

<x-display-errors/>

<div class="container">
    <div class="row mt-5 justify-content-center my-5">
        <div class="col-12 col-md-6 justify-content-center">
        <form class="rounded-4 bg-secondary-subtle p-3" 
        action="{{route('article.update', compact('article'))}}" 
        method="POST"
        enctype="multipart/form-data"
        {{-- Inserire enctype quando volgiamo passare dati più complessi di semplici steringhe o numeri --}}
        >
        @method('PUT') {{-- Override del motodo. stiamo sovrasrivendo il metodo originale che era POST. Spoofing --}}

    @csrf

  <div class="mb-3">
    <label for="title" class="form-label">Titolo Articolo</label>
    <input name="title" type="text" value="{{$article->title}}" class="form-control" id="title">
  </div>  
  
  <div class="mb-3">
    <label for="subtitle" class="form-label">Sottotitolo dell'Articolo</label>
    <input name="subtitle" type="text" value="{{$article->subtitle}}" class="form-control" id="subtitle">
  </div>  

  <div class="mb-3">
    <label for="body" class="form-label">Corpo dell'Articolo</label>
    <textarea name="body" class="form-control" id="bodye" cols="30" rows="10">{{$article->body}}</textarea>
  </div>  

  <div class="mb-3">
    @foreach($tags as $tag)
  <div class="form-check">
  <input class="form-check-input" name="tags[]" type="checkbox" value="{{$tag->id}}" id="flexCheckDefault" @if($article->tags->contains($tag)) checked  @endif>
  <label class="form-check-label" for="flexCheckDefault">
    {{$tag->name}}
  </label>
</div>
@endforeach
</div>

  <div class="mb-3">
    <span class="form-label">Immagine attuale:</span>
    <img src="{{Storage::url($article->img)}}" alt="{{$article->title}}" width="400" height="200"srcset="">          
  </div>  

  <div class="mb-3">
    <label for="img" class="form-label">Inserisci immagine</label>    
    <input name="img" type="file" class="form-control d-flex me-3" id="img">       
  </div>  

  <button type="submit" class="btn btn-primary">Modifica Articolo</button>
</form>
        </div>
    </div>
</div>

</x-layout>