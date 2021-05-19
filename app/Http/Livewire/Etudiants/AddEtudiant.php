<?php

namespace App\Http\Livewire\Etudiants;

use App\Models\Pays;
use App\Models\Region;
use App\Models\Departement;
use Livewire\Component;

class AddEtudiant extends Component
{
    public $selectedPays = null;
    public $regions = null;
    public $selectedRegion = null;
    public $departements = null;


    public function render()
    {
        $pays = Pays::all();
        return view('livewire.etudiants.add-etudiant',[
            'pays' => $pays
        ]);
    }

     /***Selectionner tous les regions d'un pays donnee */
     public function updatedSelectedPays($pays_id){
        
        $this->regions = Region::where('pays_id', $pays_id)->get();
    }

    /***Selectionner tous les departements d'une region donnee */
    public function updatedSelectedRegion($region_id){

        $this->departements = Departement::where('region_id', $region_id)->get();
    }
}
