<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalibersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('calibers')->insert([
            [
                'name' => '18',
                'price' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '21',
                'price' => '2500',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '23.5',
                'price' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '24',
                'price' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
