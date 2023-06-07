<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//sign up
Route::get('logout', [ProfileController::class, 'logout'])->name('logout');

Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class);
// afficher les posts sous forme cards
Route::get('list-posts',[PostController::class,'listPosts'] )->name('listPosts');

// Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories_edit');
require __DIR__.'/auth.php';
