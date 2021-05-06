<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PaysTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(DepartementsTableSeeder::class);
        $this->call(CyclesTableSeeder::class);
        $this->call(MentionsTableSeeder::class);
        $this->call(ParcoursTableSeeder::class);
        $this->call(NiveauxTableSeeder::class);

    }
}
