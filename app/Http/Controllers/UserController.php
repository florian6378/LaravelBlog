<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Afficher la liste des utilisateurs
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Afficher le formulaire de création d'un utilisateur
    public function create()
    {
        return view('users.create');
    }

    // Enregistrer un nouvel utilisateur
    public function store(Request $request)
    {
        // Validez les données de la requête...
        
        // Créez un nouvel utilisateur avec les données de la requête
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Enregistrez l'utilisateur dans la base de données
        $user->save();

        // Redirigez l'utilisateur vers une page appropriée
        // Redirigez l'utilisateur vers une page appropriée
    return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    // Afficher les détails d'un utilisateur spécifique
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    // Afficher le formulaire de modification d'un utilisateur
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Mettre à jour les informations d'un utilisateur
    public function update(Request $request, $id)
    {
        // Validez les données de la requête...

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // Mettez à jour d'autres champs au besoin
        ]);

        // Redirigez l'utilisateur vers une page appropriée

        return redirect()->route('users.show', $id)->with('success', 'User updated successfully');
    }

    // Supprimer un utilisateur
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // Redirigez l'utilisateur vers une page appropriée

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}