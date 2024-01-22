<?php

use App\Http\Controllers\keahlian;
use App\Http\Controllers\NewsBaru;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;



Route::get('/belajarapi', [NewsBaru::class, 'belajarapi'])->name('belajar');

Route::get('/fetch-data', [NewsController::class, 'fetchData']);


Route::middleware(['auth'])->group(function () {
    
     Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/berita', [NewsController::class, 'index'])->name('berita');
    Route::get('/', function () {
        return view('layout.master');
    }); 
    Route::get('/user/sort', [UserController::class, 'sort'])->name('user.sort');
    Route::get('/user/export', [UserController::class, 'export_excel'])->name('user.export');
    Route::post('/user/import',   [UserController::class, 'import'])->name('users.import');
    // penambahan  fitur agar bisa ke diteck  harus di taruh bagian atas 
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/import-news', [NewsController::class, 'getNews']);

    
    Route::get('/skill', [keahlian::class,'index'])->name('skill.index');
    Route::get('/skill/create', [keahlian::class,'create'])->name('skill.create');
    Route::post('/skill',[keahlian::class, 'store'])->name('skill.store');
    Route::get('/skill/{id}/edit', [keahlian::class, 'edit'])->name('skill.edit');
    Route::put('/skill/{id}',[keahlian::class, 'update'])->name('skill.update');
    Route::delete('skill/{id}', [keahlian::class, 'destroy'])->name('skill.destroy');

});
    require __DIR__ . '/auth.php';


