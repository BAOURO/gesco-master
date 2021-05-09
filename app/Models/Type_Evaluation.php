<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_Evaluation extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_evaluation', 'abreviation'
    ];
}
