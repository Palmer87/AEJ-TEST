<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromoteurRrequest;
use App\Models\Projet;
use App\Models\Promoteur;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromoteurController extends Controller
{


    public function dashboard()
    {
        if(Auth::user()->role == 'promoteur'){
            $user = Auth::user();

            $projets = Projet::paginate(5);
            return view('dashboard.promoteur', compact('projets', 'user'));
        }else{
            notify()->error('Vous n\'avez pas accès à cette page');
            return redirect()->back();
        }



    }




}

