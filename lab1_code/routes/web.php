<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BlogEditController;
use App\Http\Controllers\admin\GuestbookEditController;
use App\Http\Controllers\admin\VisitorController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\InterestsController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () { return view('index'); });

Route::get('/about', function () { return view('about'); });

Route::get('/education', function () { return view('education'); });

Route::get('/interests', [InterestsController::class, 'index'])->name('interests.index');

Route::get('/photoalbum', [AlbumController::class, 'index'])->name('photoalbum.index');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/test', [TestController::class, 'index'])->name('test.index');
Route::post('/test', [TestController::class, 'store'])->name('test.store');

Route::get('/guestbook', [GuestbookController::class, 'index']);
Route::post('/guestbook', [GuestbookController::class, 'store']);

Route::get('/blog', [BlogController::class, 'index']);

Route::get('/reg_user', [UserController::class, 'indexReg']);
Route::post('/reg_user', [UserController::class, 'storeReg']);

Route::get('/log_user', [UserController::class, 'indexLog']);
Route::post('/log_user', [UserController::class, 'checkLog']);

Route::get('/logout', [LogoutController::class, 'logout']);


Route::group(['prefix' => 'admin'], function () {
    Route::get('/log_admin', [AdminController::class, 'index']);
    Route::post('/log_admin', [AdminController::class, 'check']);

    Route::group(['middleware' => 'auth.admin'], function() {
        Route::get('/blog-editor', [BlogEditController::class, 'indexEditor']);
        Route::post('/blog-editor', [BlogEditController::class, 'store']);

        Route::get('/upload-blog', [BlogEditController::class, 'indexUpload']);
        Route::post('/upload-blog', [BlogEditController::class, 'uploadSubmit']);

        Route::get('/upload-guestbook', [GuestbookEditController::class, 'index']);
        Route::post('/upload-guestbook', [GuestbookEditController::class, 'storeUpload']);

        Route::get('/visitors', [VisitorController::class, 'index']);
    });
});


