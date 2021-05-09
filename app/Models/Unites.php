<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unites extends Model
{
    use HasFactory;
    protected $fillable = [
        'intitule', 'credit', 'coef', 'nb_heure'
    ];
}
