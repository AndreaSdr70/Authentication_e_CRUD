<?php

namespace App\Http\Controllers;

use App\Models\Tag;
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
        $tags = Tag::all(); //Recupero tutti i tag dalla tabella tags [SELECT * FROM tags]

        return view('article.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                       
             $article = Article::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'body' => $request->body                
            ]);

            if ($request->file('img')) {// L'utemte mi ha passato l'immagine?
                $article->img = $request->file('img')->store('public/img');// Valorizzo lìoggetto con il nuovo valore di img
                $article->save(); // Salvo nel datanase il nuovo valore dell'oggetto
            }

            $article->tags()->attach($request->tags);
            // $article
            // ->tags() // Sto utilizzando il metodo di relazione many to many che ho definito nelm odello compio questa operazione quando devo scrivere nel database

            // ->attach($request->tags); //Con il metodo attach gli passo gli id degli oggetti che voglio mettere in relazione al modello di partenza

        
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

        $tags = Tag::all();
        //
        return view('article.edit', compact('article', 'tags')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
        // dd($request->all(), $article);
        if ($request->file('img')){

        Storage::delete($article->img);//Elimnare la vecchia immagine

            // dd($result);

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

        $article->tags()->sync($request->tags); // Sincronizza l'attale relazione aggiornata tra i tag selezionati e quelli deselezionati

        return redirect(route('article.index'))->with('message', 'articolo modificato');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {

        $article->tags()->detach(); // Eliminare ogni vincolo di relazione tra i due modelli
        //metodo per eliminare un articolo
        $article->delete();

        return redirect()->back()->with('message', 'articolo eliminato');
    }
}
