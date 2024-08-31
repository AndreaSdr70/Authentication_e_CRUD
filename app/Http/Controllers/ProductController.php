<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    //!! DEPRECATED
// public function __construct()
// {
// $this->middleware('auth'); 
// }

    public function create(){
        return view('product.create');
    }


    public function store(ProductRequest $request){//Modifico il tipo di classe request che passo come parametro (dependent injection, ereditarietà)
        
        // dd($request->all());
        // i dati del form
        
        $name = $request->name;
        // è uguale alla sintassi $name = $request->input('name); Questo è uguale a sopra
        $description = $request->description;
        $price = $request->price;
        $img = null;

        if ($request->file('img')) {
            $img = $request
        ->file('img') //il metodo file mi cattura l'uploaded file della request
        ->store('public/img'); //il metodo store mi salva il file nel percorso 'storage/app/public/img'
        }




        

        // dd($request->all());

        // METODO SALVARE DATI DB 1
        //Creo un nuovo oggetto di classe Product
        // $product = new Product();

        // //Valorizzando i campi dell'oggetto $product
        // $product->name = $name;
        // $product->description = $description;
        // $product->price = $price;
        
        // // dd($product);
        // // Sto salvando il prodotto nel mio db
        // $product->save();

        // METODO SALVARE DATI DB 2
        // MASS ASSIGNMENT 
        // PERMETTE 
        Product::create([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'img' => $img,
            'user_id' => Auth::user()->id
        ]);
        //torna indietro nella pagina in cui stavi
        return redirect()->back()->with('message', 'Prodotto Inserito');

    }

    public function index(){

        //Sto richiedendo al mio db tuti gli elementi all'interno della tabella products 
        $products = Product::all(); // => questo significa fare la query al db SELECT * from products

        return view('product.index', ['products' => $products]);
    }

}
