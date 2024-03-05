<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class sizes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 60; $i++) {
            DB::table('sizes')->insert([
                'id' => $i,

                'size_value' => $i+9,
            ]);
        }
    }
}
