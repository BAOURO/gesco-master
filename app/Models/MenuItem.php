<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'link', 'status'
    ];

    public function submenus(){
        
        return $this->hasMany(SubMenuItem::class);
    }
}
