<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;


// Routes publiques
Route::get('/', [PageController::class, 'welcome'])->name('bienvenue');
Route::get('/mentionlegale',[PageController::class, 'mentionlegale'])->name('mention');
Route::get('/about',[PageController::class, 'about'])->name('about');
Route::get('/test', [PageController::class, 'test'])->name('test');

// Routes nécessitant l'authentification
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/dashboard/Mespost', [PageController::class, 'Mespost'])->name('mesposts');


    
    // Routes pour les posts
    Route::resource('posts', PostController::class);

    // Routes pour les catégories
    Route::resource('categories', CategoryController::class);

    // Routes pour le profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');});

require __DIR__.'/auth.php';
