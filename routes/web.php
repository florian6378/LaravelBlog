<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\UserController;

 // Routes d'administration des utilisateurs
 Route::resource('users', UserController::class);




Route::middleware(['admin'])->group(function () {
    // Routes d'administration des catégories
    Route::resource('categories', CategoryController::class);

   
});


Route::get('/dashboard/Mespost', [PageController::class, 'Mespost'])
->middleware(['auth', 'verified'])->name('mesposts');


Route::get('/test', [PageController::class, 'test'])->name('test');

Route::get('/', [PageController::class, 'welcome'])->name('bienvenue');

Route::get('/mentionlegale',[PageController::class, 'mentionlegale'])->name('mention');

Route::get('/about',[PageController::class, 'about'])->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

// returns the home page with all posts
Route::get('/', PostController::class .'@index')->name('posts.index');
// returns the form for adding a post
Route::get('/posts/post/create', PostController::class . '@create')->name('posts.create');
// adds a post to the database
Route::post('/posts', PostController::class .'@store')->name('posts.store');
// returns a page that shows a full post
Route::get('/posts/{post}', PostController::class .'@show')->name('posts.show');
// returns the form for editing a post
Route::get('/posts/{post}/edit', PostController::class .'@edit')->name('posts.edit');
// updates a post
Route::put('/posts/{post}', PostController::class .'@update')->name('posts.update');
// deletes a post
Route::delete('/posts/{post}', PostController::class .'@destroy')->name('posts.destroy');
// Retourne la page d'accueil avec tous les posts
Route::get('/', [PostController::class, 'index'])->name('posts.index');

// Route pour afficher tous les catégories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Route pour afficher un formulaire de création de catégorie
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

// Route pour traiter la création d'une nouvelle catégorie
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

// Route pour afficher les détails d'une catégorie spécifique
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

// Route pour afficher le formulaire de modification d'une catégorie
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

// Route pour mettre à jour une catégorie existante
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

// Route pour supprimer une catégorie
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');




Route::view('/access-denied', 'access_denied')->name('access.denied');


require __DIR__.'\auth.php';

