<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PostController;

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

// Route::get('/', [EventController::class, 'getData']);

Route::middleware('auth')->group(function () {
    Route::get('/home', [EventController::class, 'getData'])->name('home');
    Route::get('/posts/create', [PostController::class ,'create']);
    Route::get('/posts/events/{event}', [EventController::class ,'showEvent']);
    Route::post('/posts/events', [EventController::class ,'store']);
    Route::get('/posts/news/{news}', [EventController::class ,'showNews']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
