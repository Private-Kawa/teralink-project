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
    // getdata 全てのデータを取得
    Route::get('/home', [PostController::class, 'getData'])->name('home');
    
    // create 新しいデータを作成
    Route::get('/posts/create', [PostController::class ,'create']);
    
    // showEvent イベント表示
    Route::get('/posts/events/{event}', [PostController::class ,'showEvent']);
    
    // showNews ニュース表示
    Route::get('/posts/news/{news}', [PostController::class ,'showNews']);
    
    // storeEvents イベント保存
    Route::post('/posts/events', [PostController::class ,'storeEvents']);
    
    // storeNews ニュース保存
    Route::post('/posts/news', [PostController::class ,'storeNews']);
    
    // editEvent イベント編集
    Route::get('/posts/events/{event}/edit', [PostController::class, 'editEvent']);
    
    // editNews ニュース編集
    Route::get('/posts/news/{news}/edit', [PostController::class, 'editNews']);
    
    // updateEvent イベント更新
    Route::put('/posts/events/{event}', [PostController::class, 'updateEvent']);
    
    // updateNews ニュース更新
    Route::put('/posts/news/{news}', [PostController::class, 'updateNews']);
    
    // deleteEvent イベント削除
    Route::delete('/posts/events/{event}', [PostController::class,'deleteEvent']);
    
    // deleteNews ニュース削除
    Route::delete('/posts/news/{news}', [PostController::class,'deleteNews']);
    
    // profile プロフィール編集・更新・削除
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
