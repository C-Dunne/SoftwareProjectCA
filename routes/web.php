<?php

use App\Http\Controllers\ProfileController;

// use App\Http\Controllers\ItemController as ItemController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ItemController as AdminItemController;
use App\Http\Controllers\User\ItemController as UserItemController;

use App\Http\Controllers\Admin\CenterController as AdminCenterController;
use App\Http\Controllers\User\CenterController as UserCenterController;


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

//items route for admin and user
Route::resource('/admin/items', AdminItemController::class)->middleware(['auth'])->names('admin.items');
Route::resource('/user/items', UserItemController::class)->middleware(['auth'])->names('user.items')->only(['index', 'show']);

Route::resource('/admin/centers', AdminCenterController::class)->middleware(['auth'])->names('admin.centers');
Route::resource('/user/centers', UserCenterController::class)->middleware(['auth'])->names('user.centers')->only(['index', 'show']);

// Route::resource('/items',ItemController::class);

require __DIR__.'/auth.php';


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
