<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use Illuminate\Http\Request;

class CycleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cycles = Cycle::all();
        return view('config.cycles.index', compact('cycles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('config.cycles.create');
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
            'abreviation' => 'required'
        ]);
        
        $cycle = new Cycle();

        $cycle->firstOrCreate([
            'nom' => $request->input('nom'),
            'abreviation' => $request->input('abreviation')
        ]);

        return redirect()->route('config.cycles.index')->with('success', 'Le cycle a été ajouté avec success !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cycle  $cycle
     * @return \Illuminate\Http\Response
     */
    public function show(Cycle $cycle)
    {
        return view('config.cycles.show', compact('cycle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cycle  $cycle
     * @return \Illuminate\Http\Response
     */
    public function edit(Cycle $cycle)
    {
        return view('config.cycles.edit',  compact('cycle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cycle  $cycle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cycle $cycle)
    {
        $request->validate([
            'nom' => 'required|string|min:3',
            'abreviation' => 'required|string|min:3'
        ]);

        $cycle->update([
            'nom' => $request->input('nom'),
            'abreviation' => $request->input('abreviation')
        ]);

        return redirect()->route('config.cycles.index')->with('success', 'Le cycle a été mise a jour !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cycle  $cycle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cycle $cycle)
    {
        $cycle->mentions->detach();
        $cycle->delete();
        return back()->with('success', 'le cycle a été supprimé avec success !!!');
    }
}
