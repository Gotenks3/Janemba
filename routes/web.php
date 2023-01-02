<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChangeEmailController;
use App\Http\Controllers\LikeController;
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

Route::get('/', function () {
    return view('welcome');
});

// マイページ
Route::prefix('mypage')->group(function(){
    Route::get('/', [UserController::class, 'mypage'])->name('mypage');
});

// メールアドレス変更
Route::prefix('email')->group(function(){
    // view
    Route::get('/edit', [ChangeEmailController::class, 'index'])->name('email');
    // 編集
    Route::post('/', [ChangeEmailController::class, 'sendChangeEmailLink'])->name('email.reset');
});

// 新規メールアドレスに更新
Route::get("reset/{token}", [ChangeEmailController::class, 'reset'])->name('reset');

// プロフィール
Route::prefix('profile')->group(function(){
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('edit/{profile}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('update', [ProfileController::class, 'update'])->name('profile.update');
    // Route::post('add', [CartController::class, 'add'])->name('cart.add');   
    // Route::post('delete/{item}', [CartController::class, 'delete'])->name('cart.delete');
    // Route::get('checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    // Route::get('success', [CartController::class, 'success'])->name('cart.success');
    // Route::get('cancel', [CartController::class, 'cancel'])->name('cart.cancel');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// いいね機能
Route::post('/like/{productId}',[LikeController::class,'store'])->name('like');
Route::post('/unlike/{productId}',[LikeController::class,'destroy'])->name('unlike');


Route::resource('product', ProductController::class)->middleware('auth');
