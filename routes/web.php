<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\CurhatanController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/curhatan', [CurhatanController::class, 'index'])->name('home');
    Route::get('/curhatan/{hashtags}', [CurhatanController::class, 'showByHashtags'])->name('home.showByHashtags');
    Route::post('/curhatan', [CurhatanController::class, 'store'])->name('home.store');

    Route::get('/mengikuti', function () {
        return view('mengikuti');
    })->name('mengikuti');

    Route::get('/diikuti', function () {
        return view('diikuti');
    })->name('diikuti');

    Route::get('/hashtags', function () {
        return view('hashtags');
    })->name('hashtags');

    Route::get('/notifikasi', function () {
        return view('notifikasi');
    })->name('notifikasi');

    Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.image-upload');
});