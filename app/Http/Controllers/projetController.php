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

    public function index()
    {
        return view('admin.projets.index',['projets' => Projet::orderBy('created_at', 'desc')->paginate(15)]);
    }



    public function create()
    {
        return view('projets.form', ['projet' => new Projet()]);
    }

    public function store(creerProjeRequest $request)
    {
        $request->validated();

        $user = Auth::user();

        if (!$user || !$user->promoteur) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté comme promoteur pour soumettre un projet.');
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

        return redirect()->route('promoteur.dashboard')->with('success', 'Projet soumis avec succès.');
    }



    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $projet = Projet::findOrFail($id);
        return view('admin.projets.form', ['projet' => $projet]);
    }


    public function update(creerProjeRequest $request, string $id)
    {
        $projet = Projet::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('plan_affaires')) {
            $data['plan_affaires'] = $request->file('plan_affaires')->store('plans','public');
        }

        $projet->update($data);

        return redirect()->route('admin.projets.index')->with('success', 'Projet mis à jour avec succès');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
