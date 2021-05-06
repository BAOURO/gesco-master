<?php

namespace App\Models;

use App\Models\Cycle;
use App\Models\Parcours;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mention extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'abreviation', 'cycle_id'
    ];

    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }

    public function parcours()
    {
        return $this->hasMany(Parcours::class);
    }
}
