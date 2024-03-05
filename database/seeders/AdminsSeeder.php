<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'title' => 'Owner',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Content Moderator',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
