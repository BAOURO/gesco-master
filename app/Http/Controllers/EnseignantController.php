<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Enseignants;
use Illuminate\Support\Facades\DB;

class EnseignantController extends Controller
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
        $enseignants = Enseignants::paginate(10);
        return view('config.enseignants.index', compact('enseignants'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('enseignants.index');
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
        DB::table('enseignants')->insert([
            'noms_prenoms' => $request->input('noms_prenoms'),
            'grade' => $request->input('grade'),
            'titre' => $request->input('titre'),
            'domaine' => $request->input('domaine')
        ]);
        //
        //$a = AnneeAcademiques::create();
        //$a->annee = $request->input('annee');
        //$a->save();
        return redirect()->route('enseignants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $enseignants = Enseignants::paginate(10);
        return view('enseignants.list', compact('enseignants'));
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
    public function update(Request $request, $enseignant)
    {
        //
        $data = $request->all();
        //print_r($data); die();
        $enseignant = Enseignants::where('id', $enseignant)->first();
        $enseignant->noms_prenoms = $data['noms_prenoms'];
        $enseignant->titre = $data['titre'];
        $enseignant->domaine = $data['domaine'];
        $enseignant->grade = $data['grade'];
        $enseignant->save();
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
