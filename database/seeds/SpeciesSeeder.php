<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('species')->delete();

        DB::table('species')->insert([

            # 1 - Anfíbios
            [
                'id'             => 1,
                'name'           => 'Perereca',
                'slug'           => Str::slug('Perereca'),
                'animal_type_id' => 1,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 2,
                'name'           => 'Sapo',
                'slug'           => Str::slug('Sapo'),
                'animal_type_id' => 1,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 3,
                'name'           => 'Outros',
                'slug'           => Str::slug('Outros'),
                'animal_type_id' => 1,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

            # 2 - Aves
            [
                'id'             => 4,
                'name'           => 'Cacatua',
                'slug'           => Str::slug('Cacatua'),
                'animal_type_id' => 2,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 5,
                'name'           => 'Calopsita',
                'slug'           => Str::slug('Calopsita'),
                'animal_type_id' => 2,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 6,
                'name'           => 'Canário',
                'slug'           => Str::slug('Canário'),
                'animal_type_id' => 2,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 7,
                'name'           => 'Curio',
                'slug'           => Str::slug('Curio'),
                'animal_type_id' => 2,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 8,
                'name'           => 'Galinha',
                'slug'           => Str::slug('Galinha'),
                'animal_type_id' => 2,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 9,
                'name'           => 'Galo',
                'slug'           => Str::slug('Galo'),
                'animal_type_id' => 2,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 10,
                'name'           => 'Papaguaio',
                'slug'           => Str::slug('Papaguaio'),
                'animal_type_id' => 2,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 11,
                'name'           => 'Pardal',
                'slug'           => Str::slug('Pardal'),
                'animal_type_id' => 2,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 12,
                'name'           => 'Pato',
                'slug'           => Str::slug('Pato'),
                'animal_type_id' => 2,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 13,
                'name'           => 'Periquito',
                'slug'           => Str::slug('Periquito'),
                'animal_type_id' => 2,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 14,
                'name'           => 'Peru',
                'slug'           => Str::slug('Peru'),
                'animal_type_id' => 2,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 15,
                'name'           => 'Peru',
                'slug'           => Str::slug('Peru'),
                'animal_type_id' => 2,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 16,
                'name'           => 'Outros',
                'slug'           => Str::slug('Outros'),
                'animal_type_id' => 2,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

            # 3 - Invertebrados
            [
                'id'             => 17,
                'name'           => 'Aranhas',
                'slug'           => Str::slug('Aranhas'),
                'animal_type_id' => 3,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 18,
                'name'           => 'Caramujos',
                'slug'           => Str::slug('Caramujos'),
                'animal_type_id' => 3,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 19,
                'name'           => 'Carangueijos',
                'slug'           => Str::slug('Carangueijos'),
                'animal_type_id' => 3,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 20,
                'name'           => 'Outros',
                'slug'           => Str::slug('Outros'),
                'animal_type_id' => 3,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

            # 4 - Mamíferos
            [
                'id'             => 21,
                'name'           => 'Boi',
                'slug'           => Str::slug('Boi'),
                'animal_type_id' => 4,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 22,
                'name'           => 'Cachorro',
                'slug'           => Str::slug('Cachorro'),
                'animal_type_id' => 4,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 23,
                'name'           => 'Camundongo',
                'slug'           => Str::slug('Camundongo'),
                'animal_type_id' => 4,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 24,
                'name'           => 'Cavalo',
                'slug'           => Str::slug('Cavalo'),
                'animal_type_id' => 4,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 25,
                'name'           => 'Chinchila',
                'slug'           => Str::slug('Chinchila'),
                'animal_type_id' => 4,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 26,
                'name'           => 'Coelho',
                'slug'           => Str::slug('Coelho'),
                'animal_type_id' => 4,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 27,
                'name'           => 'Gato',
                'slug'           => Str::slug('Gato'),
                'animal_type_id' => 4,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 28,
                'name'           => 'Porco da India',
                'slug'           => Str::slug('Porco da India'),
                'animal_type_id' => 4,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 29,
                'name'           => 'Ramster',
                'slug'           => Str::slug('Ramster'),
                'animal_type_id' => 4,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 30,
                'name'           => 'Vaca',
                'slug'           => Str::slug('Vaca'),
                'animal_type_id' => 4,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],


            // parei aqui
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
