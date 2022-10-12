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
                'slug'       => Str::slug('Anfíbios'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 2,
                'name'       => 'Aves',
                'slug'       => Str::slug('Aves'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 3,
                'name'       => 'Invertebrados',
                'slug'       => Str::slug('Invertebrados'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 4,
                'name'       => 'Mamíferos',
                'slug'       => Str::slug('Mamíferos'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 5,
                'name'       => 'Peixes',
                'slug'       => Str::slug('Peixes'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 6,
                'name'       => 'Reptil',
                'slug'       => Str::slug('Reptil'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
