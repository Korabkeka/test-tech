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

Route::get('/articles/{article}', [ArticleController::class, "show"]);

Route::get('/new', [ArticleController::class, "create"]);

Route::post('/store', [ArticleController::class, "store"]);

Route::post('/update/{article}', [ArticleController::class, "update"]);

Route::delete('/delete/{article}', [ArticleController::class, "delete"]);
