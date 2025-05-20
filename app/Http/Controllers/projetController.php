<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Auth;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {dd($request);
        // vali
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'type_projet' =>'required|string|max:255',
            'plan_affaires' =>'required|string',
            'form_juridique' =>'required|string',

        ]);


        $Projet=Projet::create([
            'titre' =>$validatedData['titre'],
            'description' =>$validatedData['description'],
            'type_projet' =>$validatedData['type_projet'],
            'plan_affaires' =>$validatedData['plan_affaires'],
            'form_juridique' =>$validatedData['form_juridique'],
            'promoteur_id' => Auth::user()->promoteur->id, // <- foreign key reference
            'status' => 'en attente',

        ]);
<<<<<<< HEAD
=======
        
>>>>>>> ac97c10 (refactor:Améliore la création de gestionnaires en utilisant directement la méthode create dans le modèle, simplifiant ainsi le processus et améliorant la lisibilité du code.)


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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    function valider(Request $request, $id)
    {
        $projet = Projet::findOrFail($id);
        $projet->status = 'validé';
        $projet->save();
        return redirect()->back()->with('success', 'Projet validé avec succès.');
    }
    function rejeter(Request $request, $id)
    {
        $projet = Projet::findOrFail($id);
        $projet->status = 'rejeté';
        $projet->save();
        return redirect()->back()->with('success', 'Projet rejeté avec succès.');
    }
}
