<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
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

    public function show(Article $article) : Response
    {
        //$article = Article::find($id);
        return Inertia::render('Article/Detail', [
            'article' => $article
        ]);

    }

    public function create() : Response
    {
        return Inertia::render('Article/Create');
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
                "imageUrl"=> $request->file('image')->store("Articles", "public")
            ]);
            //dd($article->imageUrl);
            $article->save();
        }

        return redirect('/');
    }

    public function update(Article $article, Request $request) : RedirectResponse
    {
        if($article->title !== $request->input('title'))$article->title = $request->input('title');
        if($article->categorie !== $request->input('category'))$article->categorie = $request->input('category');
        if($article->content !== $request->input('content'))$article->content = $request->input('content');

        $image = $request->file('image');
        if($article->imageUrl && $image !== null)
        {
            Storage::disk('public')->delete($article->imageUrl);
            $article->imageUrl = $image->store("Articles", "public");
        }
        $article->update();
        return redirect('/');
    }

    public function delete(Article $article) : RedirectResponse
    {
        Storage::disk('public')->delete($article->imageUrl);
        $article->delete();
        return redirect('/');
    }
}
