<?php

namespace App\Http\Controllers;

use App\Http\Requests\GestionnaireRequest;
use App\Models\Gestionnaire;
use App\Models\Projet;
use App\Models\Promoteur;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        if(Auth::user()->role == 'gestionnaire'){
            $user = Auth::user();
            $projets = Projet::with('promoteur.user')->get();
            $promoteurs = Promoteur::with('user')->get();
            return view('dashboard.gestionnaire', compact('projets','promoteurs','user'));
        }else{
            notify()->error('Vous n\'avez pas les droits pour accéder à cette page');
            return redirect()->back();
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gestionnaire.form');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GestionnaireRequest $request)
    {
        DB:: beginTransaction();
        try{
            $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'gestionnaire',
        ]);
        $gestionnaire = new Gestionnaire();
        $gestionnaire->user_id = $user->id;
        $gestionnaire->poste = $request->poste;
        $gestionnaire->telephone = $request->telephone;
        $gestionnaire->adresse = $request->adresse;
        $gestionnaire->save();
        DB::commit();


        notify()->success('Gestionnaire ajouté avec succès');
        return redirect()->back();
        }
        catch(\Exception $e){
            DB::rollback();
            notify()->error('Erreur lors de l\'ajout du gestionnaire');
            return redirect()->back()->with('error','Erreur lors de l\'ajout du gestionnaire');

        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('gestionnaire.form', ['gestionnaire' => Gestionnaire::findOrFail($id)]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'poste' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
        ]);
        $gestionnaire = Gestionnaire::findOrFail($id);
        $gestionnaire->user_id = $gestionnaire->user->id;
        $gestionnaire->poste = $request->poste;
        $gestionnaire->telephone = $request->telephone;
        $gestionnaire->adresse = $request->adresse;
        $gestionnaire->user->name = $request->name;
        $gestionnaire->user->email = $request->email;
        $gestionnaire->user->password = Hash::make($request->password);
        $gestionnaire->user->save();
        $gestionnaire->save();
        notify()->success('Gestionnaire modifié avec succès');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


 

}
