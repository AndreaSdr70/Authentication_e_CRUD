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
        //
        // $title = $request->title;
        // $subtitle = $request->subtitle;
        // $body = $request->body;
        // $img = $request->file('img')->store('public/img');
        
        //Metodo MASS ASSIGNMENT
        //Creiamo un nuovo articolo con i dati della request
        Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'img' => $request->file('img')->store('public/img'),

        ]);
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
