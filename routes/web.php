<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImagesUploadController;
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
    
    //For adding an image
    Route::get('/add-image',[ImageUploadController::class,'addImage'])->name('images.add');
    
    //For storing an image
    Route::post('/store-image',[ImageUploadController::class,'storeImage'])
    ->name('images.store');
    
    //For showing an image
    Route::get('/view-image',[ImageUploadController::class,'viewImage'])->name('images.view');
});

require __DIR__.'/auth.php';
