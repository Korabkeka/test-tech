<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Article;
use Inertia\Inertia;
use Inertia\Response;


class ArticleController extends Controller
{
    public function all()
    {
        $articles = Article::all();
        return Inertia::render('Article/Show', [
            'articles' => $articles
        ]);
    }

    public function show(string $id) : Response
    {
        $article = Article::find($id);
        return Inertia::render('Article/Detail', [
            'article' => $article
        ]);

    }

    public function create() : Response
    {
        return Inertia::render('Article/Formular');
    }

    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|unique:articles|max:255',
            'content' => 'required',
            'category'=> 'required',
            'image'=> 'file|required'
        ]);
        //dd($validated);
        if ($validated)
        {
            $article = new Article([
                "title" => $request->input("title"),
                "content" => $request->input("content"),
                "categorie" => $request->input("category"),
                "imageUrl"=> "/storage/". $request->file('image')->store("Articles", "public")
            ]);
            dd($article->imageUrl);
            $article->save();

        }

        return redirect('/');
    }
}
