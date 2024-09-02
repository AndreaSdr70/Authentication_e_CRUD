<x-layout>

<x-masthead title="I miei prodotti"></x-masthead>

<div class="container">
    <div class="row my-5">
        {{-- @dd($products) --}}
        @foreach($products as $product)
        <div class="col-12 col-md-4">   
            <x-card
                :product="$product"
            />  
        </div>
        @endforeach
    </div>
</div>

</x-layout>