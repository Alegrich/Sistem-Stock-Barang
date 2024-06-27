<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stock::create([
            'item_name' => 'Item A',
            'quantity' => 100,
            'type' => 'in',
        ]);

        Stock::create([
            'item_name' => 'Item B',
            'quantity' => 50,
            'type' => 'out',
        ]);
    }
}
