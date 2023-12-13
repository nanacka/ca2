<?php

use App\Http\Controllers\ImagesUploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\User\PostController as UserPostController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    
    //Route::get('/tags', [TagController::class, 'index'])->name('posts.index');
    //Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

    //Route::get('/posts/create', [AdminPostController::class, 'create'])->name('posts.create');
    //Route::post('/posts', [AdminPostController::class, 'store'])->name('admin.posts.store');

    //Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    //Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    //Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    //Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    // Route::get('/posts/{id}',       [AdminPostController::class, 'show'])->name('posts.show');
    // Route::get('/posts/{id}/edit',  [AdminPostController::class, 'edit'])->name('posts.edit');
    // Route::put('/posts/{id}',       [AdminPostController::class, 'update'])->name('posts.update');
    // Route::delete('/posts/{id}',    [AdminPostController::class, 'destroy'])->name('posts.destroy');

    // Route::get('/posts/{id}',       [UserPostController::class, 'show'])->name('posts.show');
    // Route::get('/posts/{id}/edit',  [UserPostController::class, 'edit'])->name('posts.edit');
    // Route::put('/posts/{id}',       [UserPostController::class, 'update'])->name('posts.update');
    // Route::delete('/posts/{id}',    [UserPostController::class, 'destroy'])->name('posts.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); 

    Route::get('/home', [HomeController::class, 'index'])->name('home.index');

    Route::resource('/posts', UserPostController::class)
        ->middleware(['auth', 'role:user'])
        ->names('user.posts')
        ->only('index', 'show');

    Route::resource('admin/posts', AdminPostController::class)
        ->middleware(['auth', 'role:admin'])
        ->names('admin.posts');

    Route::resource('/comments', CommentController::class)
        ->middleware('auth')
        ->names('comments');
  
    //For adding an image
    //Route::get('/add-image',[ImageUploadController::class,'addImage'])->name('images.add');
    
    //For storing an image
    //Route::post('/store-image',[ImageUploadController::class,'storeImage'])
    //->name('images.store');
    
    //For showing an image
    //Route::get('/view-image',[ImageUploadController::class,'viewImage'])->name('images.view');
});

require __DIR__.'/auth.php';
