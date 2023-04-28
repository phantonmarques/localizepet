<?php

use App\ORM\User\Phone\PhoneType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PhoneTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phone_types')->delete();

        DB::table('phone_types')->insert([
            [
                'id'         => PhoneType::FIXO,
                'name'       => 'Fixo',
                'slug'       => str_slug('Fixo'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => PhoneType::CELULAR,
                'name'       => 'Celular',
                'slug'       => str_slug('Celular'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
