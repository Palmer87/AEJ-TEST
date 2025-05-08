<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Promoteur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admincontroller extends Controller
{
        public function index()
        {
            $projets = Projet::with('promoteur.user')->get();
            $promoteurs = Promoteur::with('user')->get();
            return view('dashboard.admin', compact('projets','promoteurs'));

        }
        public function valider(Projet $projet)
        {
            $projet->update(['statut' => 'valide']);
            notify()->success('Projet validé avec succès','Projet');
            return back()->with('success', 'Projet validé avec succès.');
        }

        public function rejeter(Request $request, Projet $projet)
        {
            $request->validate([
                'justification' => 'required|string|max:1000',
            ]);

            $projet->update([
                'statut' => 'rejeté',
                'motif_rejet' => $request->justification,
            ]);
            notify()->error('Projet rejeté avec justification','Projet');

            return back()->with('success', 'Projet rejeté avec justification.');
        }
        public function destroy( string $id)
        {
            $user = User::findOrFail($id);
            $user->delete();
            notify()->success('Promoteur supprimé avec succès','utilisateur');
            return back()->with('success', 'Promoteur supprimé avec succès.');
        }

 }


