<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuItem::create([
            'name' => 'Parametrage',
            'link' => '#',
            'status' => 'enable',
        ]);

        MenuItem::create([
            'name' => 'UE',
            'link' => 'unites.index',
            'status' => 'enable',
        ]);
        MenuItem::create([
            'name' => 'Enseignants',
            'link' => 'enseignants.index',
            'status' => 'enable',
        ]);
        MenuItem::create([
            'name' => 'Etudiants',
            'link' => 'etudiants.index',
            'status' => 'enable',
        ]);
    }
}
