<?php

use Illuminate\Database\Seeder;
use App\ORM\User\User;
use App\ORM\Auth\Permission;
use App\ORM\Auth\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Users Manager
        $manager = Role::where('slug', 'manager')->first();
        $adminPermissions = Permission::where('slug', 'admin-permission')->first();

        $userManager = new User();
        $userManager->name = 'Daniel Marques';
        $userManager->email = 'revolt_car@hotmail.com';
        $userManager->email_verified_at = date('Y-m-d H:i:s');
        $userManager->password = bcrypt('123456');
        $userManager->contact = '41984518821';
        $userManager->city_id = 4175;
        $userManager->site = 'http://daniel-olindo.com.br';
        $userManager->approved = true;
        $userManager->save();
        $userManager->roles()->attach($manager);
        $userManager->permissions()->attach($adminPermissions);        
    }
}
