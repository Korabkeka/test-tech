<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Inertia\Inertia;
use Inertia\Response;


class ArticleController extends Controller
{

    public function all()
    {
        $articles = Article::all();
        //dd($articles);
        return Inertia::render('Article/Show', [
            'articles' => Article::all()
        ]);
    }

    public function show(string $id) : Response
    {
        $article = Article::find($id);
        //dd($article);
        return Inertia::render('Article/Show', [
            'article' => ["title"=>"Test"]
        ]);

    }
}
