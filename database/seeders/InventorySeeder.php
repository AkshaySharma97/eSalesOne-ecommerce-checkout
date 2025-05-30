<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Inventory;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        $variants = ['RED-M', 'BLACK-L', 'WHITE-S'];

        foreach ($products as $product) {
            foreach ($variants as $variant) {
                Inventory::create([
                    'product_id' => $product->id,
                    'variant' => $variant,
                    'quantity' => rand(10, 25),
                ]);
            }
        }
    }
}
