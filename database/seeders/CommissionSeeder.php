<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('commissions')->insert([
            [
                'value' => '250',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
