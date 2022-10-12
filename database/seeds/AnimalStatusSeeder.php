<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AnimalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal_status')->delete();

        DB::table('animal_status')->insert([
            [
                'id'         => 1,
                'name'       => 'A procura',
                'slug'       => Str::slug('A procura'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 2,
                'name'       => 'Desaparecido',
                'slug'       => Str::slug('Desaparecido'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 3,
                'name'       => 'Localizado',
                'slug'       => Str::slug('Localizado'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
