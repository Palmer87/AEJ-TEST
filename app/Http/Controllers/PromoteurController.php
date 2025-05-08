<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromoteurRrequest;
use App\Models\Promoteur;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromoteurController extends Controller
{


    public function dashboard()
    {
        $userId = Auth::id(); // Récupère l’ID de l’utilisateur connecté

        // Recherche le promoteur lié à cet utilisateur, avec la relation "user"
        $promoteur = Promoteur::with('user')->where('utilisateur_id', $userId)->first();


        return view('dashboard.promoteur', [
            'promoteur' => $promoteur,
            'projets' => $promoteur?->projets ?? collect(), // Utilisation du null safe pour éviter l’erreur
        ]);


    }
   



}

