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

        /**Menus et sous menus */
        $this->call(MenuItemsTableSeeder::class);
        $this->call(SubMenuItemsTableSeeder::class);

        /**Pays regions et departements */
        $this->call(PaysTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(DepartementsTableSeeder::class);

        /**Annees, cycles, mentions, parcours, niveaux */
        $this->call(AnneesTableSeeder::class);
        $this->call(CyclesTableSeeder::class);
        $this->call(MentionsTableSeeder::class);
        $this->call(ParcoursTableSeeder::class);
        $this->call(NiveauxTableSeeder::class);

    }
}
