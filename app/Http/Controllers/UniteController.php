<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unites;
class UniteController extends Controller
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
        //
        $unites = Unites::paginate(10);
        return view('config.unites.index', compact('unites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'intitule' => 'required|string',
            'credits' => 'required|integer',
            'cc' => 'required|integer',
            'tpe' => 'required|integer',
            'tp' => 'required|integer' 
        ]);

        Unites::firstOrCreate([
            'intitule' => $request->input('intitule'),
            'credit' => $request->input('credits'),
            'cc' => $request->input('cc'),
            'tpe' => $request->input('tpe'),
            'tp' => $request->input('tp'),
            'nb_heure' => $request->input('nb_heure'),
            'coef' => $request->input('coef')
        ]);

        return redirect()->route('unites.index')->with('success', 'Le parcours a été ajouté avec success !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $unite)
    {
        //
        $data = $request->all();
        //print_r($data); die();
        $unite = Unites::where('id', $unite)->first();
        $unite->intitule = $data['intitule'];
        $unite->credit = $data['credit'];
        $unite->nb_heure = $data['nb_heure'];
        $unite->coef = $data['coef'];
        $unite->cc = $data['cc'];
        $unite->tpe = $data['tpe'];
        $unite->tp = $data['tp'];
        $unite->save();
        return response()->json(['success'=>'Le parcours a été Modifié avec success !!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
