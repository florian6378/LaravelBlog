<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'description' => 'required',
            'categories' => 'required|array', // Assurez-vous que le champ "categories" est un tableau
            'categories.*' => Rule::exists('categories', 'id'), // Vérifie que chaque catégorie existe dans la table des catégories
        ]);

        // Vérifie si un utilisateur est authentifié
        if (Auth::check()) {
            // Récupère l'utilisateur connecté
            $user = Auth::user();

            // Crée une nouvelle instance de Post avec les données du formulaire
            $post = new Post([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'description' => $request->input('description'),
            ]);

            // Associe l'utilisateur au post
            $post->user()->associate($user);
            $post->save();

            // Attache les catégories sélectionnées au post
            $post->categories()->attach($request->categories);

            return redirect()->route('posts.index')->with('success', 'Post created successfully.');
        } else {
            // Gérez le cas où aucun utilisateur n'est authentifié
            // Vous pouvez rediriger l'utilisateur vers une page de connexion ou effectuer une autre action appropriée.
            return redirect()->back()->with('error', 'You must be logged in to create a post.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'description' => 'required'
        ]);

        // Récupère le post à mettre à jour
        $post = Post::find($id);

        // Met à jour les champs spécifiés avec les données de la requête
        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'description' => $request->input('description')
        ]);

        // Met à jour les catégories associées au post
        $post->categories()->sync($request->categories);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }
}
