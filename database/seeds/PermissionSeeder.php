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
                'slug'       => Str::slug('Aprovar Anúncios'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 2,
                'name'       => 'Rejeitar Anúncios',
                'slug'       => Str::slug('Rejeitar Anúncios'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 3,
                'name'       => 'Listar Anúncios',
                'slug'       => Str::slug('Listar Anúncios'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 4,
                'name'       => 'Cadastrar Anúncios',
                'slug'       => Str::slug('Cadastrar Anúncios'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 5,
                'name'       => 'Editar Anúncios',
                'slug'       => Str::slug('Editar Anúncios'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 6,
                'name'       => 'Excluir Anúncios',
                'slug'       => Str::slug('Excluir Anúncios'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 7,
                'name'       => 'Banner',
                'slug'       => Str::slug('Banner'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 8,
                'name'       => 'Contribuidores',
                'slug'       => Str::slug('Contribuidores'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 9,
                'name'       => 'Gerenciar Usuários',
                'slug'       => Str::slug('Gerenciar Usuários'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 10,
                'name'       => 'Página Personalizada',
                'slug'       => Str::slug('Página Personalizada'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
