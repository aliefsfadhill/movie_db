<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'category_name' => 'Action',
                'description' => 'Ini adalah kategori action',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'category_name' => 'Drama',
                'description' => 'Ini adalah kategori drama',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Horror',
                'description' => 'Ini adalah kategori horror',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Fantasy',
                'description' => 'Ini adalah kategori fantasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Comedy',
                'description' => 'Ini adalah kategori komedi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
