<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Auth;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

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
    { $projet = Projet::findOrFail($id);
        $projet->status = 'validé';
        $projet->updated_at = now();
        $projet->save();

        // Générer le PDF
        $pdf = Pdf::loadView('pdf.decision', [
            'projet' => $projet,
            'status' => 'validé',
            'date' => now()->format('d/m/Y'),
            'justification' => null,
        ]);

        $fileName = 'decision_projet_'.$projet->id.'.pdf';
        Storage::put("public/pdfs/$fileName", $pdf->output());
        notify()->success('Projet validé avec succès');
        return back();
        }

    public function rejeter(Request $request, $id)
    {
        $projet = Projet::findOrFail($id);
        $projet->status = 'rejeté';
        $projet->updated_at = now();
        $projet->save();

        // Générer le PDF avec justification
        $pdf = Pdf::loadView('pdf.decision', [
            'projet' => $projet,
            'status' => 'rejeté',
            'date' => now()->format('d/m/Y'),
            'justification' => $request->justification,
        ]);

        $fileName = 'decision_projet_'.$projet->titre.'.pdf';
        Storage::put("public/pdfs/$fileName", $pdf->output());
        notify()->success('Projet rejeté et PDF généré.');
        return back();
    }

}

