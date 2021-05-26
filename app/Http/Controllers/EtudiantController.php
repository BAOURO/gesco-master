<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Pays;
use App\Models\Region;
use App\Models\Cycle;
use App\Models\Mention;
use App\Models\Parcours;
use App\Models\Niveau;
use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Spatie\SimpleExcel\SimpleExcelReader;
class EtudiantController extends Controller
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
        //print_r();die();
        Etudiant::firstOrCreate($request->except('_token'));
        return response()->json(['success'=>'Le parcours a été Modifié avec success !!!']);
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
            'nom_tuteur' => 'string|nullable', 
            'tel_tuteur' => 'integer|nullable', 
            'adresse_tuteur' => 'string|nullable', 
            'profession_tuteur' => 'string|nullable', 
            'residence_tuteur' => 'string|nullable'
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
            'nom_tuteur' => $request->input('nom_tuteur'), 
            'tel_tuteur' => $request->input('tel_tuteur'), 
            'adresse_tuteur' => $request->input('adresse_tuteur'), 
            'profession_tuteur' => $request->input('profession_tuteur'), 
            'residence_tuteur' => $request->input('residence_tuteur')
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

    public function liste()
    {
        # code...
        $mentions = Mention::all();
        $parcours = Parcours::all();
        $niveaux = Niveau::all();
        //$etudiants = [];
        return view('config.etudiants.liste', compact('niveaux', 'parcours', 'mentions'));
    }

    public function getEtudiants()
    {
        # code...
        $etudiants = Etudiant::all();
        return datables()->of($etudiants)->toJson();
    }

    public function getEtudiant_mention(Request $request)
    {
        # code...
        $data = $request->except('_token');
        $etudiants = Etudiant::where('cycle_id', $data['cycle'])
                        ->where('mention_id', $data['mention'])->get();
        return response()->json(['etudiants'=>$etudiants]);
    }

    public function import_excel (Request $request) {

        // 1. Validation du fichier uploadé. Extension ".xlsx" autorisée
        $this->validate($request, [
            'fichier' => 'bail|required|file|mimes:xlsx'
        ]);

        // 2. On déplace le fichier uploadé vers le dossier "public" pour le lire
        $fichier = $request->fichier->move(public_path(), $request->fichier->hashName());

        // 3. $reader : L'instance Spatie\SimpleExcel\SimpleExcelReader
        $reader = SimpleExcelReader::create($fichier);

        // On récupère le contenu (les lignes) du fichier
        $rows = $reader->getRows();

        // $rows est une Illuminate\Support\LazyCollection
        $etudiants = $rows->toArray();
        // 4. On insère toutes les lignes dans la base de données
        foreach ($etudiants as $key) {
            # code...
            $pays = Pays::where('nom', $key['pays_id'])->first();
            $region = Region::where('code', $key['region_id'])->first();
            $cycle = Cycle::where('abreviation', $key['cycle_id'])->first();
            $mention = Mention::where('abreviation', $key['mention_id'])->first();
            $key['pays_id'] = $pays->id;
            $key['region_id'] = $region->id;
            $key['cycle_id'] = $cycle->id;
            $key['mention_id'] = $mention->id;
            //print_r($cycle->id);
            $et = Etudiant::insert([
                'cycle_id'=>$cycle->id,
                'mention_id'=>$mention->id,
                'matricule' => $key['matricule'],
                'nom' => $key['nom'], 
                'prenom' => $key['prenom'], 
                'date_naissance'  => $key['date_naissance'], 
                'lieu_naissance' => $key['lieu_naissance'],
                'sexe'  => $key['sexe'], 
                'telephone'  => $key['telephone'], 
                'situation_mat'  => $key['situation_mat'], 
                'profession'  => $key['profession'],
                'pays_id'  => $pays->id,
                'region_id'  => $region->id, 
                'nom_pere'  => $key['nom_pere'],
                'tel_pere'  => $key['tel_pere'], 
                'adresse_pere' => $key['adresse_pere'], 
                'profession_pere' => $key['profession_pere'],
                'residence_parent' => $key['residence_parent'], 
                'nom_mere' => $key['nom_mere'], 
                'tel_mere' => $key['tel_mere'], 
                'adresse_mere' => $key['adresse_mere'], 
                'profession_mere' => $key['profession_mere'], 
                'nom_tuteur' => $key['nom_tuteur'], 
                'tel_tuteur' => $key['tel_tuteur'], 
                'adresse_tuteur' => $key['adresse_tuteur'], 
                'profession_tuteur' => $key['profession_tuteur']
            ]);
            //print_r($key);
            echo "<br>";
        }
        //die();
        return redirect()->route('etudiants.liste');

    }


}
