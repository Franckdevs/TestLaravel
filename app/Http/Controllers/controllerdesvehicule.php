<?php

namespace App\Http\Controllers;

use App\Models\car;
use Illuminate\Http\Request;

class controllerdesvehicule extends Controller
{
    public function index()
    {
        $cars = Car::select('id', 'matricule', 'couleur', 'marque', 'kilometrage', 'annee', 'photo1', 'photo2', 'photo3', 'photo4')
            ->orderBy('id')
            ->get();
        return view('listecars', compact("cars"));
    }
    // Dans la méthode index de CarsController



    public function create(Request $request)
    {
        
        $request->validate([
            'matricule' => 'required',
            'couleur' => 'required',
            'marque' => 'required',
            'annee' => 'required',
            'kilometrage' => 'required',
            'photo1' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Exemple de validation pour une image
            'photo2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo3' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo4' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
     
        $car = Car::create([
            'matricule' => $request->matricule,
            'couleur' => $request->couleur,
            'marque' => $request->marque,
            'kilometrage' => $request->kilometrage,
            'annee' => $request->annee,
            'photo1' => $request->photo1,
            'photo2' => $request->photo2,
            'photo3' => $request->photo3,
            'photo4' => $request->photo4,
        ]);

        if ($request->hasFile('photo1')) {
            $photoPath = $request->file('photo1')->store('photos', 'public');
            $car->update(['photo1' => $photoPath]);
        }
    
        if ($request->hasFile('photo2')) {
            $photoPath = $request->file('photo2')->store('photos', 'public');
            $car->update(['photo2' => $photoPath]);
        }

        if ($request->hasFile('photo3')) {
            $photoPath = $request->file('photo3')->store('photos', 'public');
            $car->update(['photo3' => $photoPath]);
        }

        if ($request->hasFile('photo4')) {
            $photoPath = $request->file('photo4')->store('photos', 'public');
            $car->update(['photo4' => $photoPath]);
        }

        $car->save();

        return redirect('/cars');
    }

    public function supprimer($id)
    {
        Car::findOrFail($id)->delete();
    
        return redirect('/listecars');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'matricule' => 'required',
            'couleur' => 'required',
            'marque' => 'required',
            'annee' => 'required',
            'kilometrage' => 'required',
            'photo1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo3' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo4' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $car = Car::find($id);

        if (!$car) {
            return redirect('/cars')->with('error', 'Véhicule non trouvé.');
        }

        $car->update([
            'matricule' => $request->matricule,
            'couleur' => $request->couleur,
            'marque' => $request->marque,
            'kilometrage' => $request->kilometrage,
            'annee' => $request->annee,
        ]);

        if ($request->hasFile('photo1')) {
            $photoPath = $request->file('photo1')->store('photos', 'public');
            $car->update(['photo1' => $photoPath]);
        }

        if ($request->hasFile('photo2')) {
            $photoPath = $request->file('photo2')->store('photos', 'public');
            $car->update(['photo2' => $photoPath]);
        }

        if ($request->hasFile('photo3')) {
            $photoPath = $request->file('photo3')->store('photos', 'public');
            $car->update(['photo3' => $photoPath]);
        }

        if ($request->hasFile('photo4')) {
            $photoPath = $request->file('photo4')->store('photos', 'public');
            $car->update(['photo4' => $photoPath]);
        }

        $car->save();

        return redirect('/cars')->with('success', 'Véhicule mis à jour avec succès.');
    }
}
