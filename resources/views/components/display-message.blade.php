{{-- Snippet codice per mostrare errori di validazione --}}
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif