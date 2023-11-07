<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImagesUploadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------users
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
    //users
    //Route::get('/users', [UserController::class, 'index'])->name('users.edit');
    //Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    //Route::user('/users', [UserController::class, 'store'])->name('users.store');
    //Route::get('/users', [UserController::class, 'show'])->name('users.show');
    //Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    //Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    //Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
//
    //posts
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    
    //For adding an image
    Route::get('/add-image',[ImageUploadController::class,'addImage'])->name('images.add');
    
    //For storing an image
    Route::post('/store-image',[ImageUploadController::class,'storeImage'])
    ->name('images.store');
    
    //For showing an image
    Route::get('/view-image',[ImageUploadController::class,'viewImage'])->name('images.view');
});

require __DIR__.'/auth.php';
