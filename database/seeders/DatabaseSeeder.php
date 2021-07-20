<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ApprovalSeeder;
use Database\Seeders\RoleAndPermissionSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleAndPermissionSeeder::class,

            UserSeeder::class,

            ApprovalSeeder::class

        ]);
    }
}
