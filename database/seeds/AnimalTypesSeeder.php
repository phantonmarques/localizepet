<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AnimalTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal_types')->delete();

        DB::table('animal_types')->insert([
            [
                'id'         => 1,
                'name'       => 'Anfíbios',
                'slug'       => str_slug('Anfíbios'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 2,
                'name'       => 'Aves',
                'slug'       => str_slug('Aves'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 3,
                'name'       => 'Invertebrados',
                'slug'       => str_slug('Invertebrados'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 4,
                'name'       => 'Mamíferos',
                'slug'       => str_slug('Mamíferos'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 5,
                'name'       => 'Peixes',
                'slug'       => str_slug('Peixes'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 6,
                'name'       => 'Reptil',
                'slug'       => str_slug('Reptil'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
