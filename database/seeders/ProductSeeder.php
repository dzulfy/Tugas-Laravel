<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'code' => 'P001',
                'name' => 'Product 1',
                'unit' => 'pcs',
                'price' => 10000,
                'stock' => 50,
            ]
        ]);
    }
}
