<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class inscription extends Controller
{

    public function getUtilisateur($id)
{
    $user= User::findOrFail($id);
   
    return compact('user');
}

    public function supprimer($id)
{
    User::findOrFail($id)->delete();

    return redirect('/gestionutilisateur');
}

public function index()
{
    $users = User::select('id','name', 'email', 'password','role','created_at', 'updated_at')->orderBy('id')->get();
    dd($users);
    return view('gestionutilisateur.index', compact('users'));
}


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation pour les images
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'profile_picture'=>$request->profile_picture,
        ]);
    
        if ($request->hasFile('profile_picture')) {
            $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $imagePath;
            
            // Déplacez la sauvegarde ici, à l'intérieur de la condition
            
        }
        $user->save();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();  // Récupère l'utilisateur connecté
            return view('acceuil', compact('user'));
        } else {
            return redirect('/connexion')->with('error', 'Adresse e-mail ou mot de passe incorrect');
        }
    }
    


public function modification(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation pour les images
    ]);

    $user = User::find(Auth::id()); // Récupère l'utilisateur connecté

    if (!$user) {
        return redirect('/connexion')->with('error', 'Utilisateur introuvable');
    }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);

    if ($request->hasFile('profile_picture')) {
        $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        $user->profile_picture = $imagePath;
    }

    $user->save(); // Met à jour l'utilisateur

    Auth::login($user); // Connecte l'utilisateur après la modification

    return view('acceuil', compact('user'));
}


public function connexion(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Utilisation de la méthode attempt pour tenter de connecter l'utilisateur
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Connexion réussie
        $user = Auth::user();  // Récupère l'utilisateur connecté

        // Vérifie le rôle de l'utilisateur
        if ($user->role === 'admin') {
            // Redirige l'administrateur vers la vue gestionutilisateur
            return view('acceuil', compact('user'));
        } else {
            // Redirige les utilisateurs normaux vers la vue acceuil
            return view('acceuil', compact('user'));
        }
    } else {
        
        // Connexion échouée
        return  view('/connexion');
    }
}

public function supprimerPhoto()
{
    $user = Auth::user();

    if (!$user) {
        return redirect('/connexion')->with('error', 'Utilisateur introuvable');
    }

    // Supprime la photo de profil du stockage
    if ($user->profile_picture) {
        Storage::disk('public')->delete($user->profile_picture);
    }

    // Met à jour la colonne 'profile_picture' dans la table de la base de données
    if (is_object($user)) {
        DB::table('users')->where('id', $user->id)->update(['profile_picture' => null]);
    }
    return view('acceuil', compact('user'));
}



}