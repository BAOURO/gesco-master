<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@univ-ndere.cm',
            'password' => bcrypt('password'),
        ]);
        $admin->attachRole('admin');

        $directeur = User::create([
            'name' => 'directeur',
            'email' => 'directeur@univ-ndere.cm',
            'password' => bcrypt('password'),
        ]);
        $directeur->attachRole('directeur');

        $daarcs = User::create([
            'name' => 'daarcs',
            'email' => 'daarcs@univ-ndere.cm',
            'password' => bcrypt('password'),
        ]);
        $daarcs->attachRole('daarcs');

        $cellule = User::create([
            'name' => 'Cellule',
            'email' => 'cellule@univ-ndere.cm',
            'password' => bcrypt('password'),
        ]);
        $cellule->attachRole('cellule');

        $scolarite = User::create([
            'name' => 'Scolarite',
            'email' => 'scolarite@univ-ndere.cm',
            'password' => bcrypt('password'),
        ]);
        $scolarite->attachRole('scolarite');
    }
}
