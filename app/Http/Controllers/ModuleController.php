<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Niveau;
use App\Models\Module;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
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
        $modules = Module::paginate(10);
        $niveaux = Niveau::all();
        return view('config.modules.index', compact('modules', 'niveaux'));
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
        Module::insert($request->except('_token'));
        return redirect()->route('modules.index');
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
    public function update(Request $request, $module)
    {
        //
        $data = $request->all();
        $p = Module::where('id', $module)->first();
        $p->nom = $data['nom'];
        $p->nombre_credits = $data['nombre_credits'];
        $p->save();
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

    public function getunites(Request $request)
    {
        # code...
        $data = $request->except('_token');
        $unites = DB::table('uemodules')
                ->select('unites.*')
                ->join('unites', 'unites.id', '=', 'uemodules.unite_id')
                ->where('module_id', $data['module'])
                ->get();
        return response()->json(['unites'=>$unites]);
        //print_r($data);
    }
}
