<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApprovalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('approvals')->insert([
            'user_id' => 3,
            'name' => 'Updated Name',
            'email' => 'Updatedemail@gmail.com',
        ]);
    }
}
