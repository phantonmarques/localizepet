<?php

use Illuminate\Database\Seeder;
use App\ORM\Auth\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manager = new Role();
        $manager->name = 'Gestor';
        $manager->slug = 'manager';
        $manager->save();

        $ong = new Role();
        $ong->name = 'ONG';
        $ong->slug = 'ong';
        $ong->save();

        $partners = new Role();
        $partners->name = 'Parceiros';
        $partners->slug = 'partners';
        $partners->save();
    }
}
