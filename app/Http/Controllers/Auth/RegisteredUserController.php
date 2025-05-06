<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromoteurRrequest;
use App\Models\Promoteur;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(PromoteurRrequest $request): RedirectResponse
    {
        DB:: beginTransaction();
        try{
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'promoteur',
        ]);

        $promoteur = new Promoteur();
        $request->utilisateur_id ;
        $promoteur->date_naissance = $request->date_naissance;
        $promoteur->lieu_naissance = $request->lieu_naissance;
        $promoteur->numero_cni = $request->numero_cni;
        $promoteur->cni_image = $request->cni_image;
        $promoteur->save();
        DB::commit();


        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('promoteur.dashboard');
    }
    catch(\Exception $e){
        DB::rollBack();
        Log::error('Erreur lors de la du promotuer :'.$e->getMessage());
        return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors de l\'enregistrement.']);
    }
    }

}
