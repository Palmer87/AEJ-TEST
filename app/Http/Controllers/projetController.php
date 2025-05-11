<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CreerProjetRequest as AdminCreerProjetRequest;
use App\Http\Requests\creerProjeRequest;
use App\Http\Requests\CreerProjetRequest;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class projetController extends Controller
{

    public function create()
    {
        return view('projets.form', ['projet' => new Projet()]);
    }

    public function store(creerProjeRequest $request)
    {
        $request->validated();

        $user = Auth::user();

        if (!$user->promoteur) {
            return back()->with('error', 'Vous n\'avez pas les autorisations nécessaires pour créer un projet.');
        }

        $promoteur = $user->promoteur;

        if (!$request->hasFile('plan_affaires')) {
            return back()->with('error', 'Le fichier n\'a pas été reçu.');
        }

        $file = $request->file('plan_affaires');
        if (!$file->isValid()) {
            return back()->with('error', 'Le fichier n\'est pas valide.');
        }
        if ($file->getClientOriginalExtension() !== 'pdf') {
            return back()->with('error', 'Le fichier doit être au format PDF.');
        }

        Projet::create([
            'promoteur_id' => $promoteur->id,
            'titre' => $request->titre,
            'type_projet' => $request->type_projet,
            'forme_juridique' => $request->forme_juridique,
            'plan_affaires' => $request->file('plan_affaires')->store('plans','public'),
            'status' => 'en attente',

        ]);
        notify()->success('Projet soumis avec succès','projet');

        return redirect()->route('promoteur.dashboard')->with('success', 'Projet soumis avec succès.');
    }



    public function show(Projet $projet)
    {

        return view('projets.show', ['projet' => $projet]);
    }

    public function edit(Projet $projet)
    {
        return view('projets.form', ['projet' => $projet,]);
    }


    public function update(creerProjeRequest $request, string $id)
    {
        $projet = Projet::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('plan_affaires')) {
            $data['plan_affaires'] = $request->file('plan_affaires')->store('plans','public');
        }

        $projet->update($data);

        return redirect()->route('promoteur.dashboard')->with('success', 'Projet mis à jour avec succès');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $projet = Projet::findOrFail($id);
        $projet->delete();
        return redirect()->route('promoteur.dashboard')->with('success', 'Projet supprimé avec succès');
    }
}
