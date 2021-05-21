<?php

namespace App\Models;
use App\Models\Mention;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cycle extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'abreviation'
    ];

    public function mentions()
    {
        return $this->hasMany(Mention::class);
    }
}
