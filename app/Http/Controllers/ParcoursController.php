<?php

namespace App\Http\Controllers;

use App\Models\Mention;
use App\Models\Parcours;
use Illuminate\Http\Request;

class ParcoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parcours = Parcours::paginate(5);
        $mentions = Mention::all();
        return view('config.parcours.index', compact('parcours', 'mentions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mentions = Mention::all();
        return view('config.parcours.create', compact('mentions'));
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
            'nom' => 'required|string|min:3',
            'abreviation' => 'required|string|min:3',
            'mention_id' => 'required|integer'
        ]);

        Parcours::firstOrCreate([
            'nom' => $request->input('nom'),
            'abreviation' => $request->input('abreviation'),
            'mention_id' => $request->input('mention_id')
        ]);

        return redirect()->route('parcours.index')->with('success', 'Le parcours a été ajouté avec success !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parcours  $parcours
     * @return \Illuminate\Http\Response
     */
    public function show(Parcours $parcours)
    {
        return view('config.parcours.show', compact('parcours'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parcours  $parcours
     * @return \Illuminate\Http\Response
     */
    public function edit(Parcours $parcours)
    {
        $mentions = Mention::all();
        return view('config.parcours.edit', compact('parcours', 'mentions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parcours  $parcours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parcours $parcours)
    {
        $request->validate([
            'nom' => 'required|string|min:3',
            'abreviation' => 'required|string|min:3',
            'mention_id' => 'required|integer'
        ]);

        $parcours->update([
            'nom' => $request->input('nom'),
            'abreviation' => $request->input('abreviation'),
            'mention_id' => $request->input('mention_id')
        ]);

        return redirect()->route('parcours.index')->with('success', 'Le parcours a été Modifié avec success !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parcours  $parcours
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parcours $parcours)
    {
        $parcours->delete();
        return back()->with('success', 'Le parcours a été supprimé !!!');
    }
}
