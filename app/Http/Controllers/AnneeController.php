<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use Illuminate\Http\Request;

class AnneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annees = Annee::paginate();
        return view('annees.index', compact('annees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annees.create');
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
            'annee_debut' => 'required',
            'annee_fin' => 'required'
        ]);

        Annee::firstOrCreate([
            'annee_debut' => $request->input('annee_debut'),
            'annee_fin' => $request->input('annee_fin')
        ]);

        return redirect()->route('annees.index')->with('success', 'L\'Année a été ajouté avec success !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Annee  $annee
     * @return \Illuminate\Http\Response
     */
    public function show(Annee $annee)
    {
        return view('annees.show', compact('annee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Annee  $annee
     * @return \Illuminate\Http\Response
     */
    public function edit(Annee $annee)
    {
        return view('annees.edit', compact('annee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annee  $annee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annee $annee)
    {
        $request->validate([
            'annee_debut' => 'required',
            'annee_fin' => 'required'
        ]);

        $annee->update([
            'annee_debut' => $request->input('annee_debut'),
            'annee_fin' => $request->input('annee_fin')
        ]);

        return redirect()->route('annees.index')->with('success', 'L\'Année a été modifié avec success !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annee  $annee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annee $annee)
    {
        $annee->delete();
        return back()->with('success', 'L\'Année a été supprimé avec success !!!');
    }
}
