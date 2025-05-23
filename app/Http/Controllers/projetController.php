<?php

namespace App\Http\Controllers;

use App\Mail\ProjetStatutMail;
use App\Models\Projet;
use Auth;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Mail;

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
    {
        // vali

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'type_projet' =>'required|string|max:255',
            'plan_affaires' =>'file|mimes:pdf,doc,docx', // Ajoutez les extensions de fichiers autorisées ici, par exemple : 'pdf,doc,docx,odt'
            'forme_juridique' =>'required|string',

        ]);






        $projet=Projet::create([
            'promoteur_id'=> Auth::user()->promoteur->id,
            'titre'=>$request->titre,
            'description'=>$request->description ,
            'type_projet'=>$request->type_projet ,
            'plan_affaires'=>$request->file('plan_affaires')->store('plan_affaires'),
            'forme_juridique'=>$request->forme_juridique ,
            'status'=> 'en attente',

        ]);
        notify()->success('Projet ajouté avec succès');
    return redirect()->route('promoteur.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $projet=Projet::findOrFail($id);
        return view('projets.show',compact('projet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $projet=Projet::findOrFail($id);
        return view('projets.create',compact('projet'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titre' =>'required|string|max:255',
            'description' =>'required|string',
            'type_projet' =>'required|string|max:255',
            'plan_affaires' =>'file|mimes:pdf,doc,docx', // Ajoutez les extensions de fichiers autorisées ici, par exemple : 'pdf,doc,docx,odt'
            'forme_juridique' =>'required|string',
        ]);
        $projet=Projet::findOrFail($id);
        $projet->titre=$request->titre;
        $projet->description=$request->description;
        $projet->type_projet=$request->type_projet;
        $projet->plan_affaires=$request->file('plan_affaires')->store('plan_affaires');
        $projet->forme_juridique=$request->forme_juridique;
        $projet->save();
        notify()->success('Projet modifié avec succès');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $projet=Projet::findOrFail($id);
        $projet->delete();
        notify()->success('Projet supprimé avec succès');
        return back();
    }
    function valider($id)
    {
        $projet = Projet::findOrFail($id);
        $projet->status = 'validé';
        $projet->updated_at = now();
        $projet->save();
        //dd($projet);
        Mail::to($projet->promoteur->user->email)->send(new ProjetStatutMail($projet, 'validé'));
        notify()->success('Projet validé avec succès et notification envoyée.');
        return back();
    }

    public function rejeter(Request $request, $id)
    {
        $request->validate([
            'justification' => 'required|string',
        ]);
        $projet = Projet::findOrFail($id);
        $projet->status = 'rejeté';
        $projet->updated_at = now();
        $projet->save();

        Mail::to($projet->promoteur->user->email)->send(new ProjetStatutMail($projet, 'rejeté', $request->justification));
        notify()->success('Projet rejeté avec succès et notification envoyée.');
        return back();
    }
}

