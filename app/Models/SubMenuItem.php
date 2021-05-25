<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'link', 'status', 'menu_item_id'
    ];

    public function menu_item(){

        return $this->belongsTo(Menu::class);
    }
}
