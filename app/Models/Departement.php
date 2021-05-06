<?php

namespace App\Models;

use App\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departement extends Model
{
    use HasFactory;

    protected $fillable =[
        'nom', 'chef_lieu', 'region_id'
    ];

    public function region()
    {
        $this->belongsTo(Region::class);
    }
}
