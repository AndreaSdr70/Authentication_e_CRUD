<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //
    public function store(Request $request){
        // dd($request->all());

        // i dati del form
        
        $name = $request->name;
        // è uguale alla sintassi $name = $request->input('name); Questo è uguale a sopra
        $description = $request->description;
        $price = $request->price;

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
            'price' => $price
        ]);
        //torna indietro nella pagina in cui stavi
        return redirect()->back();

    }

    public function index(){

        //Sto richiedendo al mio db tuti gli elementi all'interno della tabella products 
        $products = Product::all();

        return view('product.index', ['products' => $products]);
    }

}
