<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cycle;
use App\Models\Mention;
use App\Models\Parcours;
use App\Models\Unites;
use App\Models\Niveau;
use App\Models\Ueniveau;
use App\Models\Uemodule;
use App\Models\Annee;
use App\Models\Module;
use Illuminate\Support\Facades\DB;
class InscriptionController extends Controller
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
        $cycles = Cycle::all();
        $niveaux = Niveau::all();
        $parcours = Parcours::all();
        $mentions = Mention::all();
        return view('config.inscriptions.index', compact('cycles', 'mentions', 'niveaux', 'parcours'));
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
    public function update(Request $request, $id)
    {
        //
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

    public function ue_niveau()
    {
        # code...
        $niveaux = Niveau::all();
        $annees = Annee::all();
        $ues = Unites::all();
        return view('config.inscriptions.ue_niveau', compact('ues', 'niveaux', 'annees'));
    }

    public function ue_niveau_post(Request $request)
    {
        # code...
        $data = $request->except('_token');
        if ($data['taille'] > 0) {
            # code...
            for ($i=1; $i <= $data['taille']; $i++) { 
                # code...
                Ueniveau::insert([
                    'annee_id'=>$data['annee_id'],
                    'semestre'=>$data['semestre'],
                    'niveau_id'=>$data['niveau_id'],
                    'unite_id'=>$data['ue'.$i]
                ]);
            }
        }
        return response()->json(['success'=>'ok']);
    }

    public function ue_niveau_liste(Request $request)
    {
        # code...
        $niveaux = Niveau::all();
        $annees = Annee::all();
        return view('config.inscriptions.ue_niveau_liste', compact('niveaux', 'annees'));
    }

    public function getUes(Request $request)
    {
        # code...
        $data = $request->except('_token');
        $ues = DB::table('ueniveaus')
                ->select('ueniveaus.semestre', 'ueniveaus.id as id_i', 'annees.annee_debut', 'annees.annee_fin', 'niveaux.nom', 'unites.*')
                ->join('unites', 'unites.id', '=', 'ueniveaus.unite_id')
                ->join('annees', 'annees.id', '=', 'ueniveaus.annee_id')
                ->join('niveaux', 'niveaux.id', '=', 'ueniveaus.niveau_id')
                ->where('ueniveaus.annee_id', $data['annee_id'])
                ->where('ueniveaus.niveau_id', $data['niveau_id'])
                ->get();
        return response()->json(['ues'=>$ues]);
    }

    public function delete($i)
    {
        # code...
        Ueniveau::where('id', $i)->delete();
        return redirect()->route('inscriptions.ue_niveau_liste');
    }

    public function ue_modules(Request $request)
    {
        # code...
        $modules = Module::all();
        $annees = Annee::all();
        $unites = Unites::all();
        return view('config.inscriptions.ue_modules', compact('modules', 'unites', 'annees'));
    }

    public function getue_niveau(Request $request)
    {
        # code...
        $data = $request->except('_token');
        $ues = DB::table('ueniveaus')
                ->join('unites', 'unites.id', '=', 'ueniveaus.unite_id')
                ->where('niveau_id', $data['niveau'])
                ->where('annee_id', $data['annee_id'])
                ->select('unites.*')
                ->get();
        return response()->json(['ues'=>$ues]);
    }

    public function ue_modules_post(Request $request)
    {
        # code...
        $data = $request->except('_token');
        $nombre_unites = 0;
        $nombre_credits = 0;
        for ($i=1; $i <= $data['dataTable_length']; $i++) { 
            # code...
            if (isset($data['ue'.$i])) {
                # code...
                $unite = Unites::where('id', $data['ue'.$i])->first();
                Uemodule::insert([
                    'module_id'=>$data['module'],
                    'annee_id'=>$data['annee_id'],
                    'unite_id'=>$data['ue'.$i]
                ]);
                $nombre_credits += $unite->credit;
                $nombre_unites += 1;
            }
        }

        $module = Module::where('id', $data['module'])->first();
        $module->nombre_unites = $nombre_unites;
        $module->nombre_credits = $nombre_credits;
        $module->save();
        return redirect()->route('modules.index');
    }
}
