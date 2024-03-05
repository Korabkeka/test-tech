<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ArticleController::class, "all"]);

Route::get('/articles/{id}', [ArticleController::class, "show"]);

Route::post('/articles/new', function(){
    // create new article
})->name('article.create');

Route::put('articles/update/{id}', function(){
    //update article wich id is {id}
})->name('article.update');

Route::delete('articles/delete/{id}', function(){
    //delete article wich id is {id}
})->name('article.delete');
