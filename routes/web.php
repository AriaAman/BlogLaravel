<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/blog')->name("blog.")->group(function (){
    Route::get('/', function(Request $request){

        $posts =  \App\Models\Post::paginate(1, ['id', 'title']);
        /*$post->title = 'Mon premier article1';
        $post->slug =  'mon-premier-article1';
        $post->content =  'Mon contenu 2';
        $post->save();
        \App\Models\Post::all();
        */

        return $posts;

    })->name('index');

    Route::get('/{slug}-{id}', function (string $slug, string $id) {
        return [
            "slug" => $slug,
            "id" => $id
        ];
    })->where([
        "id" => '[0-9]+',
        "slug" => '[a-zA-Z0-9\-]+'
    ])->name("show");

});

