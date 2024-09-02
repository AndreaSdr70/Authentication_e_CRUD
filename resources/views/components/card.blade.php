<div class="card" style="width: 18rem;">  
  <img src=" @if($product->img) {{Storage::url($product->img)}} @else {{Storage::url('public/img/default.png')}} @endif" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$product->name}}</h5>
    <p class="card-text">{{$product->description}}</p>
    <p class="card-text">Creato dall'utente{{$product->user->name}}</p>{{-- TRAVERSAL MODEL - La capacità dei modelli di recuperare le informazioni dei modelli relazionati--}}
    <p class="card-text">{{$product->price}}€</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>