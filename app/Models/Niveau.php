<?php

namespace App\Models;

use App\Models\Parcours;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Niveau extends Model
{
    use HasFactory;

    protected $fillable =[
        'nom', 'abreviation', 'parcour_id'
    ];

    public function parcour()
    {
        return $this->belongsTo(Parcours::class);
    }

    public function module()
    {
        return $this->hasMany(Module::class);
    }
}
