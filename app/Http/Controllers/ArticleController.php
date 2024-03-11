<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleCollection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class ArticleController extends Controller
{
    public function all(Request $request)
    {
        $articles = Article::query();

        $filter = $request->input('filter');
        if($filter !== null && $filter !== "all")
        {
            $articles = $articles->where('categorie', $filter);
        }

        $orderBy = $request->input('order');
        if($orderBy === null)
        {
            $orderBy = 'desc';
        }
        $articles = $articles->orderBy('updated_at', $orderBy);

        $page = $request->input("page");
        if($page === null){
            $page = 1;
        }

        $count = $request->input("count");
        if($count === null){
            $count = 15;
        }
        $articles = $articles->paginate($count);

        $articlesCollection = new ArticleCollection($articles);

        return Inertia::render('Article/Show', [
            'articles' => $articlesCollection,
            'per_page' => $count,
            'current_page' => $page,
            'filter'=> $filter,
            'order_by'=> $orderBy
        ]);
    }

    public function allWithParams(Request $request)
    {
        return redirect()->route('all',[
            "page"=>$request->input("page"),
            "count"=>$request->input("count"),
            "filter"=>$request->input('filter'),
            "order"=>$request->input('order')
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
            if(!str_contains($article->imageUrl, "http")){
                Storage::disk('public')->delete($article->imageUrl);
            }
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
