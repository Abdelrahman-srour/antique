<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'image_path' => 'build/assets/images/items/rings/for web/For Web K 21/_V8A3350.jpg',
                'title' => 'rings',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'image_path' => 'build/assets/images/items/Bracelet/for web/For Web K 21/_V8A4669.jpg',
                'title' => 'bracelets',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'image_path' => 'build/assets/images/items/chain/for web/For Web K 21/_V8A4188.jpg',
                'title' => 'necklaces',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'image_path' => 'build/assets/images/items/Earings/for web/For Web K 21/_V8A3703.jpg',
                'title' => 'earrings',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'image_path' => 'build/assets/images/items/3 Pices/for web/For Web K 21/_V8A4538.jpg',
                'title' => 'sets',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
