<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(5);

        return view('home', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required|min:15'
        ]);

        Article::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'body' => $request->body
        ]);

        return redirect()->route('home')->with('info', 'Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($article)
    {
        $article = Article::where('slug', $article)->first();

        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($article)
    {
        $article = Article::where('slug', $article)->first();

        if ($article->user_id !== auth()->id()) {
            return "Dilarang Masuk!";
        }

        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $article)
    {
        $article = Article::where('slug', $article)->first();

        $article->update([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'body' => $request->body
        ]);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($article)
    {
        $article = Article::where('slug', $article)->first();

        $article->delete();

        return redirect()->route('home');
    }
}
