<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $title = 'Home Page';
    return view('pages.home-inheritance', compact('title'));
})->name('home');

Route::get('/tentang-kami', function () {
    $title = 'About Us';
    return view('pages.about', compact('title'));
})->name('about-us');

Route::get('/contact-us', function () {
    return view('pages.contact');
})->name('contact-us');

// Route::get('categories', [CategoryController::class, 'index'])->name('kategori.index');
// Route::get('categories/create', [CategoryController::class, 'create'])->name('kategori.create');
// Route::post('categories', [CategoryController::class, 'store'])->name('kategori.store');

// Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('kategori.edit');
// Route::put('categories/{category}', [CategoryController::class, 'update'])->name('kategori.update');

// Route::delete('categories/{category}', [CategoryController::class, 'destroy'])
//     ->name('kategori.destroy');

Route::resource('kategori', CategoryController::class); // Digunakan untuk CRUD

// admin
// dashboard
// member
// user

// Route::get('admin/dashboard' ...)->name('admin.dashboard')
// Route::get('karyawan/dashboard' ...)->name('admin.dashboard')

// admin/dashboard
// karyawan/dashboard
