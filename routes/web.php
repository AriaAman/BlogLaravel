<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\BlogController;
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
Route::get('/', [BlogController::class, 'home'])->name('welcome');

Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function (){
    Route::get('/', 'index')->name('index');
    Route::get('/new', 'create')->name('create');
    Route::post('/new','store');
    Route::get('/{post}/edit', 'edit')->name('edit');
    Route::post('/{post}/edit', 'update');
    Route::get('/{slug}-{post}', [BlogController::class, 'show'])->where([
        "post" => '[0-9]+',
        "slug" => '[a-zA-Z0-9\-]+'
    ])->name("show");
});

