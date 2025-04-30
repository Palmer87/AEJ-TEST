<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\CreerProjetRequest;
use App\Models\Projet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        $data = $request->validated();

        if ($request->hasFile('plan_affaires')) {
            $data['plan_affaires'] = $request->file('plan_affaires')->store('plans','public');
        }

        Projet::create($data);

        return redirect()->route('admin.projets.index')->with('success', 'Projet ajouté avec succès');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $projet = Projet::findOrFail($id);
        return view('admin.projets.form', ['projet' => $projet]);
    }


    public function update(CreerProjetRequest $request, string $id)
    {
        $projet = Projet::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('plan_affaires')) {
            $data['plan_affaires'] = $request->file('plan_affaires')->store('plans','public');
        }

        $projet->update($data);

        return redirect()->route('admin.projets.index')->with('success', 'Projet mis à jour avec succès');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
