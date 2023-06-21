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


Route::prefix('/blog')->name("blog.")->group(function (){
    Route::get('/', [BlogController::class, 'index'])->name('index');

    Route::get('/{slug}-{id}', [BlogController::class, 'show'])->where([
        "id" => '[0-9]+',
        "slug" => '[a-zA-Z0-9\-]+'
    ])->name("show");

});

