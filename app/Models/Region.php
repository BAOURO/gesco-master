<?php

namespace App\Models;

use App\Models\Pays;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory;

    protected $fillable =[
        'nom', 'chef_lieu', 'code', 'pays_id'
    ];

    public function pays()
    {
        $this->belongsTo(Pays::class);
    }

    public function departements()
    {
        $this->hasMany(Departement::class);
    }
}
