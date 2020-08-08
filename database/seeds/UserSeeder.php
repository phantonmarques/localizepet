<?php

use Illuminate\Database\Seeder;
use App\ORM\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User();
        $user1->name = 'Daniel Marques';
        $user1->email = 'revolt_car@hotmail.com';
        $user1->email_verified_at = date('Y-m-d H:i:s');
        $user1->password = bcrypt('123456');
        $user1->contact = '41984518821';
        $user1->city_id = 4175;
        $user1->site = 'http://daniel-olindo.com.br';
        $user1->approved = true;
        $user1->save();
    }
}
