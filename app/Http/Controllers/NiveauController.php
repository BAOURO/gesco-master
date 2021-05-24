<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AnneeAcademiques;
use App\Models\Parcours;

class NiveauController extends Controller
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
        $niveaux = Niveau::paginate(10);
        $parcours = Parcours::all();
        return view('config.niveaux.index', compact('niveaux', 'parcours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $parcours = Parcours::all();
        return view('config.niveaux.create', compact('parcours'));
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
            'parcour_id' => 'required|integer'
        ]);

        Niveau::firstOrCreate([
            'nom' => $request->input('nom'),
            'abreviation' => $request->input('abreviation'),
            'parcour_id' => $request->input('parcour_id')
        ]);

        return redirect()->route('config.niveaux.index')->with('success', 'Le Niveau a été ajouté avec success !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Niveau  $niveau
     * @return \Illuminate\Http\Response
     */
    public function show(Niveau $niveau)
    {
        return view('config.niveaux.show', compact('niveau'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Niveau  $niveau
     * @return \Illuminate\Http\Response
     */
    public function edit(Niveau $niveau)
    {
        $parcours = Parcours::all();
        return view('config.niveaux.edit', compact('parcours'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Niveau  $niveau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $niveau)
    {
        $data = $request->all();
        $p = Niveau::where('id', $niveau)->first();
        $p->nom = $data['nom'];
        $p->abreviation = $data['abreviation'];
        $p->save();
        return response()->json(['success'=>'Le parcours a été Modifié avec success !!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Niveau  $niveau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Niveau $niveau)
    {
        $niveau->delete();
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Niveau  $niveau
     * @return \Illuminate\Http\Response
     */
    public function inscriptions()
    {
        
        /**$niveaux = DB::table('niveaux')
            ->join('parcours', 'parcours.id', '=', 'niveaux.parcour_id')
            ->select('niveaux.*', 'parcours.abreviation')
            ->get();
        $annees = AnneeAcademiques::all();
        return view('niveaux.inscriptions', compact('niveaux', 'annees'));*/
    }
}
