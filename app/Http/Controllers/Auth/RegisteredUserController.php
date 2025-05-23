<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromoteurRequest;
use App\Models\Promoteur;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(PromoteurRequest $request)
    {
        // Valider et logger les données
        $validated = $request->validated();
        \Log::debug('Données validées:', $validated);

        try {
            DB::beginTransaction();

            // Création de l'utilisateur avec tous les champs requis
            $user = User::create([
                'name' => $validated['name'],
                'prenom' => $validated['prenom'], // Assurez-vous que ce champ est bien envoyé
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'promoteur'
            ]);

            // Enregistrement du fichier CNI
            $cniPath = $request->file('cni_image')->store('cni_images', 'public');

            // Création du promoteur
            $promoteur = Promoteur::create([
                'user_id' => $user->id,
                'date_naissance' => $validated['date_naissance'],
                'lieu_naissance' => $validated['lieu_naissance'],
                'numero_cni' => $validated['numero_cni'],
                'cni_image' => $cniPath
            ]);

            DB::commit();


            return redirect()->route('login');

        } catch (\Exception $e) {
            DB::rollBack();



            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'enregistrement.');
        }
    }
}
