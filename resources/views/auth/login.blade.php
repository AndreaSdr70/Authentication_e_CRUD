<x-layout>
   
<header class="header">

<div class="container h-100">
    <div class="row justify-content-center align-content-center h-100">
        <div class="col-12 col-md-6 d-flex justify-content-center">
            <h1 class="text-center">Accedi</h1>

        </div>
    </div>
</div>
</header>

<x-display-errors/>

<div class="contanier">
    <div class="row mt-5 justify-content-center">
        <div class="col-12 col-md-6">
        <form
        class="p-4 shadow rounded-4 bg-body-secondary"
        action="{{route('login')}}"
        method="POST">
        @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">    
  </div>
  
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password">
  </div>
  
  <button type="submit" class="btn btn-primary">Accedi</button>
</form>        
        </div>
    </div>
</div>
</x-layout>