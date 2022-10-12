<?php

use App\ORM\User\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users_email_verify')->delete();
        DB::table('users_permissions')->delete();

        DB::table('users')->insert([
            [
                'id'                => 1,
                'name'              => 'Daniel Marques',
                'email'             => 'revolt_car@hotmail.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password'          => bcrypt('123456'),
                'city_id'           => 4175,
                'role_id'           => Role::ID_ADMINISTRATOR,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => 2,
                'name'              => 'Fabiano Coutinho',
                'email'             => 'fabianocm1995@hotmail.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password'          => bcrypt('123456'),
                'city_id'           => 4175,
                'role_id'           => Role::ID_ADMINISTRATOR,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]
        ]);
    }
}
