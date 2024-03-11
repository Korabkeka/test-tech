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

Route::get('/', [ArticleController::class, "all"])->name('all');

Route::post('/', [ArticleController::class, "allWithParams"]);

Route::get('/articles/{article}', [ArticleController::class, "show"])->name('article');

Route::get('/new', [ArticleController::class, "create"])->name('new');

Route::post('/store', [ArticleController::class, "store"])->name('store');

Route::post('/update/{article}', [ArticleController::class, "update"]);

Route::delete('/delete/{article}', [ArticleController::class, "delete"]);
