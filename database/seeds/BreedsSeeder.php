<?php

use Illuminate\Database\Seeder;

class BreedsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('breeds')->delete();

        DB::table('breeds')->insert([

            # 21 - Cachorro
            [
                'name'          => 'Golden retriever',
                'slug'          => str_slug('Golden retriever'),
                'specie_id'     => 21,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Husky siberiano',
                'slug'          => str_slug('Husky siberiano'),
                'specie_id'     => 21,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],


            # 26 - Gatos
            [
                'name'          => 'Persa',
                'slug'          => str_slug('Persa'),
                'specie_id'     => 21,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Siamês',
                'slug'          => str_slug('Siamês'),
                'specie_id'     => 21,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

            # 33 - Peixes
            [
                'name'          => 'Betta Veil Tail',
                'slug'          => str_slug('Betta Veil Tail'),
                'specie_id'     => 21,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Betta Splendens',
                'slug'          => str_slug('Betta Splendens'),
                'specie_id'     => 21,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],


        ]);
    }
}
