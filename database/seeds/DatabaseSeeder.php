<?php

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
        /** Locations */
        $this->call(StatesSeeder::class);
        $this->call(CitySeeder::class);

        /** Security */
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);

        /** Users */
        $this->call(UserSeeder::class);

        /** Phone Type */
        $this->call(PhoneTypesSeeder::class);

        /** Animals */
        $this->call(AnimalStatusSeeder::class);
        $this->call(SpeciesSeeder::class);
    }
}
