<?php

namespace App\Models;

use App\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pays extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'code'
    ];

    public function regions()
    {
        $this->hasMany(Region::class);
    }
}
