<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Pays;
use App\Models\Region;
use App\Models\Cycle;
use App\Models\Mention;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pays = Pays::all();
        $regions = Region::all();
        $cycles = Cycle::all();
        $mentions = Mention::all();
        return view('config.etudiants.index', compact('pays', 'regions', 'cycles', 'mentions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etudiants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'matricule' => 'string|max:8',
            'nom' => 'required|string|min:3', 
            'prenom' => 'string|nullable', 
            'date_naissance'  => 'date|nullable', 
            'lieu_naissance' => 'string|nullable',
            'sexe'  => 'string|nullable', 
            'telephone'  => 'integer|nullable', 
            'situation_mat'  => 'boolean', 
            'profession'  => 'string|nullable',
            'pays_id'  => 'integer|nullable',
            'region_id'  => 'integer|nullable', 
            'departement_id'  => 'integer|nullable',
            'nom_pere'  => 'string|nullable',
            'tel_pere'  => 'integer|nullable', 
            'adresse_pere' => 'string|nullable', 
            'profession_pere' => 'string|nullable',
            'residence_pere' => 'string|nullable', 
            'nom_mere' => 'string|nullable', 
            'tel_mere' => 'integer|nullable', 
            'adresse_mere' => 'string|nullable', 
            'profession_mere' => 'string|nullable', 
            'residence_mere' => 'string|nullable',
            'nom_tituaire' => 'string|nullable', 
            'tel_tituaire' => 'integer|nullable', 
            'adresse_tituaire' => 'string|nullable', 
            'profession_tituaire' => 'string|nullable', 
            'residence_tituaire' => 'string|nullable'
        ]);
        Etudiant::firstOrCreate([
            'matricule' => $request->input('matricule'),
            'nom' => $request->input('nom'), 
            'prenom' => $request->input('prenom'), 
            'date_naissance'  => $request->input('date_naissance'), 
            'lieu_naissance' => $request->input('lieu_naissance'),
            'sexe'  => $request->input('sexe'), 
            'telephone'  => $request->input('telephone'), 
            'situation_mat'  => $request->input('situation_mat'), 
            'profession'  => $request->input('profession'),
            'pays_id'  => $request->input('pays_id'),
            'region_id'  => $request->input('region_id'), 
            'departement_id'  => $request->input('departement_id'),
            'nom_pere'  => $request->input('nom_pere'),
            'tel_pere'  => $request->input('tel_pere'), 
            'adresse_pere' => $request->input('adresse_pere'), 
            'profession_pere' => $request->input('profession_pere'),
            'residence_pere' => $request->input('residence_pere'), 
            'nom_mere' => $request->input('nom_mere'), 
            'tel_mere' => $request->input('tel_mere'), 
            'adresse_mere' => $request->input('adresse_mere'), 
            'profession_mere' => $request->input('profession_mere'), 
            'residence_mere' => $request->input('residence_mere'),
            'nom_tituaire' => $request->input('nom_tituaire'), 
            'tel_tituaire' => $request->input('tel_tituaire'), 
            'adresse_tituaire' => $request->input('adresse_tituaire'), 
            'profession_tituaire' => $request->input('profession_tituaire'), 
            'residence_tituaire' => $request->input('residence_tituaire')
        ]);

        return redirect()->route('etudiants.index')->with('success', 'L\'Etudiant a été ajouté avec success !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        return view('etudiants.show', compact('etudiant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        return view('etudiants.edit', compact('etudiant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'matricule' => 'string|max:8',
            'nom' => 'required|string|min:3', 
            'prenom' => 'string|nullable', 
            'date_naissance'  => 'date|nullable', 
            'lieu_naissance' => 'string|nullable',
            'sexe'  => 'string|nullable', 
            'telephone'  => 'integer|nullable', 
            'situation_mat'  => 'boolean', 
            'profession'  => 'string|nullable',
            'pays_id'  => 'integer|nullable',
            'region_id'  => 'integer|nullable', 
            'departement_id'  => 'integer|nullable',
            'nom_pere'  => 'string|nullable',
            'tel_pere'  => 'integer|nullable', 
            'adresse_pere' => 'string|nullable', 
            'profession_pere' => 'string|nullable',
            'residence_pere' => 'string|nullable', 
            'nom_mere' => 'string|nullable', 
            'tel_mere' => 'integer|nullable', 
            'adresse_mere' => 'string|nullable', 
            'profession_mere' => 'string|nullable', 
            'residence_mere' => 'string|nullable',
            'nom_tituaire' => 'string|nullable', 
            'tel_tituaire' => 'integer|nullable', 
            'adresse_tituaire' => 'string|nullable', 
            'profession_tituaire' => 'string|nullable', 
            'residence_tituaire' => 'string|nullable'
        ]);
        
        $etudiant->update([
            'matricule' => $request->input('matricule'),
            'nom' => $request->input('nom'), 
            'prenom' => $request->input('prenom'), 
            'date_naissance'  => $request->input('date_naissance'), 
            'lieu_naissance' => $request->input('lieu_naissance'),
            'sexe'  => $request->input('sexe'), 
            'telephone'  => $request->input('telephone'), 
            'situation_mat'  => $request->input('situation_mat'), 
            'profession'  => $request->input('profession'),
            'pays_id'  => $request->input('pays_id'),
            'region_id'  => $request->input('region_id'), 
            'departement_id'  => $request->input('departement_id'),
            'nom_pere'  => $request->input('nom_pere'),
            'tel_pere'  => $request->input('tel_pere'), 
            'adresse_pere' => $request->input('adresse_pere'), 
            'profession_pere' => $request->input('profession_pere'),
            'residence_pere' => $request->input('residence_pere'), 
            'nom_mere' => $request->input('nom_mere'), 
            'tel_mere' => $request->input('tel_mere'), 
            'adresse_mere' => $request->input('adresse_mere'), 
            'profession_mere' => $request->input('profession_mere'), 
            'residence_mere' => $request->input('residence_mere'),
            'nom_tituaire' => $request->input('nom_tituaire'), 
            'tel_tituaire' => $request->input('tel_tituaire'), 
            'adresse_tituaire' => $request->input('adresse_tituaire'), 
            'profession_tituaire' => $request->input('profession_tituaire'), 
            'residence_tituaire' => $request->input('residence_tituaire')
        ]);

        return redirect()->route('etudiants.index')->with('success', 'L\'Etudiant a été modifié avec success !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->back()->with('success', 'L\'étudiant a été supprimé !!!');
    }
}
