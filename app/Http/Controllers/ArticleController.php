<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $articles = Article::all();// Mi recupera dal DB tutti gli articoli e li salva in una collezione

        return view('article.index', compact('articles')// Nella compact passare come argomento la stringa del nome della variabile
        // ['articles' => $articles]
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Metodo 1
        // $img = null;
        
        // if ($request->file('img')) {// L'utemte mi ha passato l'immagine?

            // se si all'ora fa l'operazione di salvataggio dell'immagine

        //     $img = $request
        // ->file('img') //il metodo file mi cattura l'uploaded file della request
        // ->store('public/img'); //il metodo store mi salva il file nel percorso 'storage/app/public/img'
        // Article::create([
        //     'title' => $request->title,
        //     'subtitle' => $request->subtitle,
        //     'body' => $request->body,
        //     'img' => $request->file('img')->store('public/img'),

            // 'img' => $img,
            //$request->file('img')->store('public/img'),

        // ]);
        // }
        // else{
            // se non mi passa l'immagine allora assegnera l'immagine si default
        //     Article::create([
        //         'title' => $request->title,
        //         'subtitle' => $request->subtitle,
        //         'body' => $request->body,
        //         // 'img' => $request->file('img')->store('public/img'),
    
        //         // 'img' => $img,
        //         //$request->file('img')->store('public/img'),
    
        //     ]);
        // }
        
        //
        // $title = $request->title;
        // $subtitle = $request->subtitle;
        // $body = $request->body;
        // $img = $request->file('img')->store('public/img');
        
        //Metodo MASS ASSIGNMENT
        //Creiamo un nuovo articolo con i dati della request

        //? Metodo 2 - più pulito
             $article = Article::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'body' => $request->body                
            ]);

            if ($request->file('img')) {// L'utemte mi ha passato l'immagine?
                $article->img = $request->file('img')->store('public/img');// Valorizzo lìoggetto con il nuovo valore di img
                $article->save(); // Salvo nel datanase il nuovo valore dell'oggetto
            }

        
    return redirect()->back()->with('message', 'articolo inserito con successo');

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //

        // dd($article);
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
        return view('article.edit', compact('article')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
        // dd($request->all(), $article);
        if ($request->file('img')){
            $img = $request->file('img')->store('public/img');// La funzione store parte dal percorso storage/app
        }
        else{
            $img = $article->img;
        }

        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'img' => $img
        ]);
        return redirect(route('article.index'))->with('message', 'articolo modificato');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //metodo per eliminare un articolo
        $article->delete();

        return redirect()->back()->with('message', 'articolo eliminato');
    }
}
