<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::table('roles_permissions')->delete();

        DB::table('roles')->insert([
            [
                'id'         => 1,
                'name'       => 'Administrador',
                'slug'       => Str::slug('Administrador'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 2,
                'name'       => 'ONG',
                'slug'       => Str::slug('ONG'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 3,
                'name'       => 'Parceiros',
                'slug'       => Str::slug('Parceiros'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('roles_permissions')->insert([
            [
                'permission_id' => 1,
                'role_id'       => 2
            ],
            [
                'permission_id' => 2,
                'role_id'       => 2
            ],
            [
                'permission_id' => 3,
                'role_id'       => 2
            ],
            [
                'permission_id' => 10,
                'role_id'       => 2
            ],
            [
                'permission_id' => 7,
                'role_id'       => 3
            ],
        ]);
    }
}
