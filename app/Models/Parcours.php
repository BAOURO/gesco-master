<?php

namespace App\Models;

use App\Models\Niveau;
use App\Models\Mention;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parcours extends Model
{
    use HasFactory;

    protected $fillable =[
        'nom', 'abreviation', 'mention_id'
    ];

    public function mention()
    {
        return $this->belongsTo(Mention::class);
    }

    public function niveaux()
    {
        return $this->hasMany(Niveau::class);
    }
}
