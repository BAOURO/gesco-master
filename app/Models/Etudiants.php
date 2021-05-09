<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiants extends Model
{
    use HasFactory;
    protected $fillable = [
        'matricule', 'nom', 'prenom', 'date_naissance', 
        'lieu_naissance', 'sexe', 'telephone', 
        'situation_mat', 'profession', 'pays_id', 'region_id', 
        'departement_id', 'nom_pere', 'tel_pere', 'adresse_pere', 
        'profession_pere', 'residence_pere', 'nom_mere', 'tel_mere', 
        'adresse_mere', 'profession_mere', 'residence_mere','nom_tituaire', 
        'tel_tituaire', 'adresse_tituaire', 'profession_tituaire', 'residence_tituaire'
    ];
}
