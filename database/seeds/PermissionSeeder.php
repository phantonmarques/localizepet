<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();

        DB::table('permissions')->insert([
            [
                'id'         => 1,
                'name'       => 'Aprovar Anúncios',
                'slug'       => str_slug('Aprovar Anúncios'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 2,
                'name'       => 'Rejeitar Anúncios',
                'slug'       => str_slug('Rejeitar Anúncios'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 3,
                'name'       => 'Listar Anúncios',
                'slug'       => str_slug('Listar Anúncios'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 4,
                'name'       => 'Cadastrar Anúncios',
                'slug'       => str_slug('Cadastrar Anúncios'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 5,
                'name'       => 'Editar Anúncios',
                'slug'       => str_slug('Editar Anúncios'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 6,
                'name'       => 'Excluir Anúncios',
                'slug'       => str_slug('Excluir Anúncios'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 7,
                'name'       => 'Banner',
                'slug'       => str_slug('Banner'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 8,
                'name'       => 'Contribuidores',
                'slug'       => str_slug('Contribuidores'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 9,
                'name'       => 'Gerenciar Usuários',
                'slug'       => str_slug('Gerenciar Usuários'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 10,
                'name'       => 'Página Personalizada',
                'slug'       => str_slug('Página Personalizada'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
