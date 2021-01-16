<?php

use Illuminate\Database\Seeder;
use App\ORM\Auth\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Permission();
        $admin->name = 'Todas Permissões';
        $admin->slug = 'admin-permission';
        $admin->save();

        $manageUsers = new Permission();
        $manageUsers->name = 'Gerenciar Usuários';
        $manageUsers->slug = 'manage-users';
        $manageUsers->save();

        $animalDonate = new Permission();
        $animalDonate->name = 'Animais para Doação';
        $animalDonate->slug = 'animal-donate';
        $animalDonate->save();

        $animalLost = new Permission();
        $animalLost->name = 'Animais Perdidos';
        $animalLost->slug = 'animal-lost';
        $animalDonate->save();

        $animalFound = new Permission();
        $animalFound->name = 'Animais Encontrados';
        $animalFound->slug = 'animal-found';
        $animalFound->save();

        $plans = new Permission();
        $plans->name = 'Planos';
        $plans->slug = 'plans';
        $plans->save();

        $contributors = new Permission();
        $contributors->name = 'Contribuidores';
        $contributors->slug = 'contributors';
        $contributors->save();

        $adverts = new Permission();
        $adverts->name = 'Anúncios Todos';
        $adverts->slug = 'adverts';
        $adverts->save();

        $userConfig = new Permission();
        $userConfig->name = 'Configurações Usuário';
        $userConfig->slug = 'user-config';
        $userConfig->save();


        $userAdverts = new Permission();
        $userAdverts->name = 'Anúncio Usuário';
        $userAdverts->slug = 'user-adverts';
        $userAdverts->save();

        $flag = new Permission();
        $flag->name = 'Banner';
        $flag->slug = 'flag';
        $flag->save();

        $animalDonateUser = new Permission();
        $animalDonateUser->name = 'Animais para Doação Usuário';
        $animalDonateUser->slug = 'animal-donate-user';
        $animalDonateUser->save();

        $ongConfigPage = new Permission();
        $ongConfigPage->name = 'Configuração página Ong';
        $ongConfigPage->slug = 'ong-config-page';
        $ongConfigPage->save();
    }
}
