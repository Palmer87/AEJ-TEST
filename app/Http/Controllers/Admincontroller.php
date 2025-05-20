<?php

namespace App\Http\Controllers;

use App\Enums\ProjetStatus;
use App\Models\Projet;
use App\Models\Promoteur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admincontroller extends Controller

{
        public function dashboard()
        {
            $user = Auth::user();
            
            $projets = Projet::with('promoteur.user')->get();
            $promoteurs = Promoteur::with('user')->get();
            return view('dashboard.admin', compact('projets','promoteurs','user'));

        }
<<<<<<< HEAD
        public function destroy( string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        notify()->success('Promoteur supprimé avec succès','utilisateur');
        return back()->with('success', 'Promoteur supprimé avec succès.');
    }

=======
        public function valider(Projet $projet)
        {
            $projet->update(['statut' => 'valide']);

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


            return back()->with('success', 'Projet rejeté avec justification.');
        }
        public function destroy( string $id)
        {
            $user = User::findOrFail($id);
            $user->delete();

            return back()->with('success', 'Promoteur supprimé avec succès.');
        }
>>>>>>> ac97c10 (refactor:Améliore la création de gestionnaires en utilisant directement la méthode create dans le modèle, simplifiant ainsi le processus et améliorant la lisibilité du code.)

 }


