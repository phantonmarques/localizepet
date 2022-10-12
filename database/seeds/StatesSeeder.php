<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->delete();

        DB::table('states')->insert([
            [
                'name'          => 'Acre',
                'slug'          => 'acre',
                'state_cod'     => 'AC',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Alagoas',
                'slug'          => 'alagoas',
                'state_cod'     => 'AL',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Amazonas',
                'slug'          => 'amazonas',
                'state_cod'     => 'AM',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Amapá',
                'slug'          => 'amapa',
                'state_cod'     => 'AP',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Bahia',
                'slug'          => 'bahia',
                'state_cod'     => 'BA',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Ceará',
                'slug'          => 'ceara',
                'state_cod'     => 'CE',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Distrito Federal',
                'slug'          => 'distrito-federal',
                'state_cod'     => 'DF',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Espírito Santo',
                'slug'          => 'espirito-santo',
                'state_cod'     => 'ES',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Goiás',
                'slug'          => 'goias',
                'state_cod'     => 'GO',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Maranhão',
                'slug'          => 'maranhao',
                'state_cod'     => 'MA',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Minas Gerais',
                'slug'          => 'minas-gerais',
                'state_cod'     => 'MG',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Mato Grosso do Sul',
                'slug'          => 'mato-grosso-do-sul',
                'state_cod'     => 'MS',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Mato Grosso',
                'slug'          => 'mato-grosso',
                'state_cod'     => 'MT',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Pará',
                'slug'          => 'para',
                'state_cod'     => 'PA',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Paraiba',
                'slug'          => 'paraiba',
                'state_cod'     => 'PB',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Pernambuco',
                'slug'          => 'pernambuco',
                'state_cod'     => 'PE',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Piauí',
                'slug'          => 'piaui',
                'state_cod'     => 'PI',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Paraná',
                'slug'          => 'parana',
                'state_cod'     => 'PR',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Rio de Janeiro',
                'slug'          => 'rio-de-janeiro',
                'state_cod'     => 'RJ',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Rio Grande do Norte',
                'slug'          => 'rio-grande-do-norte',
                'state_cod'     => 'RN',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Rondônia',
                'slug'          => 'rondonia',
                'state_cod'     => 'RO',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Roraima',
                'slug'          => 'roraima',
                'state_cod'     => 'RR',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Rio Grande do Sul',
                'slug'          => 'rio-grande-do-sul',
                'state_cod'     => 'RS',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Santa Catarina',
                'slug'          => 'santa-catarina',
                'state_cod'     => 'SC',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Sergipe',
                'slug'          => 'sergipe',
                'state_cod'     => 'SE',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'São Paulo',
                'slug'          => 'sao-paulo',
                'state_cod'     => 'SP',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Tocantins',
                'slug'          => 'tocantins',
                'state_cod'     => 'TO',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]
        ]);
    }
}
