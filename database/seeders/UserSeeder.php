<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        $user=  User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('secret')
        ]);
        $user->assignRole('Admin');
        //admin
        $user=  User::create([
            'name'=>'Employee',
            'email'=>'employee@gmail.com',
            'password'=>bcrypt('secret')
        ]);
        $user->assignRole('Employee');
        //admin
        $user=  User::create([
            'name'=>'Support',
            'email'=>'support@gmail.com',
            'password'=>bcrypt('secret')
        ]);
        $user->assignRole('Support');
    }
}
