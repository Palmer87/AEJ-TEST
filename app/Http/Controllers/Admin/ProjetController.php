<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreerProjetRequest;
use App\Models\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    public function index()
    {
        return view('admin.projets.index',['projets' => Projet::orderBy('created_at', 'desc')->paginate(15)]);

    }
    public function create()
    {
        $projet = new Projet();
        return view('admin.projets.form', ['projet' => $projet]);
    }
    public function store(CreerProjetRequest $request)
    {
        $projet = Projet::create($request->validated());
        return redirect()->route('admin.projets.index')->with('success', 'Projet créé avec succès.');

    }


}
