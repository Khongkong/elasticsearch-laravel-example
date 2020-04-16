<?php

use Illuminate\Support\Facades\Route;
use App\Articles\ElasticsearchRepository;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('articles.index')->withArticles(App\Article::all());
});
Route::get('/search', function (ElasticsearchRepository $repository) {
    $articles = $repository->search((string) request('q'));

    return view('articles.index')->withArticles($articles);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');