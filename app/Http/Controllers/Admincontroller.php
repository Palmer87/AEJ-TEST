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
        public function index()
        {
            $user = Auth::user();
            
            $projets = Projet::with('promoteur.user')->get();
            $promoteurs = Promoteur::with('user')->get();
            return view('dashboard.admin', compact('projets','promoteurs','user'));

        }
        public function destroy( string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        notify()->success('Promoteur supprimé avec succès','utilisateur');
        return back()->with('success', 'Promoteur supprimé avec succès.');
    }


 }


