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


Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])
       ->name('auth.login');

Route::delete('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('auth.logout');

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'doLogin']);

Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function (){
    Route::get('/', 'index')->name('index');
    Route::get('/new', 'create')->name('create')->middleware('auth');;
    Route::post('/new','store')->middleware('auth');;
    Route::get('/{post}/edit', 'edit')->name('edit')->middleware('auth');
    Route::patch('/{post}/edit', 'update')->middleware('auth');;
    Route::get('/{slug}-{post}', [BlogController::class, 'show'])->where([
        "post" => '[0-9]+',
        "slug" => '[a-zA-Z0-9\-]+'
    ])->name("show");
});

