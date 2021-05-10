<?php

namespace App\Http\Controllers;

use App\Models\Mention;
use Illuminate\Http\Request;

class MentionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentions = Mention::all();
        return view('config.mentions.index', compact('mentions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('config.mentions.create');
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
            'cycle_id' => 'required|integer'
        ]);
        Mention::firstOrCreate(
            $request->all()
        );
        return redirect()->route('config.mentions.index')->with('success', 'La mention a été ajouté avec success !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mention  $mention
     * @return \Illuminate\Http\Response
     */
    public function show(Mention $mention)
    {
        return view('config.mentions.show', compact('mention'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mention  $mention
     * @return \Illuminate\Http\Response
     */
    public function edit(Mention $mention)
    {
        return view('config.mentions.edit', compact('mention'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mention  $mention
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mention $mention)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mention  $mention
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mention $mention)
    {
        $mention->delete();
        return redirect()->back();
    }
}
