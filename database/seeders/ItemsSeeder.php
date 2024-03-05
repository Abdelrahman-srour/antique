<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'title' => 'test1',
                'details' => 'details tesssst',
                'wight' => '5',
                'size' => '4',
                'code' => '445695328aga',
                'category_id' => '1',
                'caliber_id' => '2',
                'collection_id' => '2',
                'sets_id' => '0',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'title' => 'test1',
                'details' => 'details tesssst',
                'wight' => '5',
                'size' => '4',
                'code' => '445695328aga',
                'category_id' => '1',
                'caliber_id' => '2',
                'collection_id' => '2',
                'sets_id' => '0',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'title' => 'test1',
                'details' => 'details tesssst',
                'wight' => '5',
                'size' => '4',
                'code' => '445695328aga',
                'category_id' => '2',
                'caliber_id' => '2',
                'collection_id' => '2',
                'sets_id' => '0',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'title' => 'test1',
                'details' => 'details tesssst',
                'wight' => '5',
                'size' => '4',
                'code' => '445695328aga',
                'category_id' => '2',
                'caliber_id' => '2',
                'collection_id' => '2',
                'sets_id' => '0',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'title' => 'test1',
                'details' => 'details tesssst',
                'wight' => '5',
                'size' => '4',
                'code' => '445695328aga',
                'category_id' => '3',
                'caliber_id' => '2',
                'collection_id' => '2',
                'sets_id' => '0',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
