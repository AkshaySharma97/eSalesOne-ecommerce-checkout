<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'title' => 'Converse Chuck Taylor All Star High Top',
                'description' => 'Iconic high-top canvas sneakers with a rubber sole.',
                'price' => 2499,
                'category' => 'Footwear',
                'image_url' => 'https://images.unsplash.com/photo-1621967133462-f2840898a8e2?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'title' => 'Adidas Originals Superstar',
                'description' => 'Classic shell-toe sneakers with leather upper.',
                'price' => 3299,
                'category' => 'Footwear',
                'image_url' => 'https://images.unsplash.com/photo-1688468069415-ffb6336656f9?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8QWRpZGFzJTIwT3JpZ2luYWxzJTIwU3VwZXJzdGFyfGVufDB8fDB8fHww',
            ],
            [
                'title' => 'Nike Air Zoom Pegasus 41',
                'description' => 'Versatile running shoes with responsive cushioning.',
                'price' => 4599,
                'category' => 'Footwear',
                'image_url' => 'https://images.unsplash.com/photo-1595899943285-583157830fb2?q=80&w=1981&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'title' => "Levi's 501 Original Fit Jeans",
                'description' => 'Classic straight-leg jeans with button fly.',
                'price' => 2999,
                'category' => 'Clothing',
                'image_url' => 'https://plus.unsplash.com/premium_photo-1674828601017-2b8d4ea90aca?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'title' => 'Ray-Ban Wayfarer Sunglasses',
                'description' => 'Timeless square-shaped sunglasses with UV protection.',
                'price' => 5999,
                'category' => 'Accessories',
                'image_url' => 'https://plus.unsplash.com/premium_photo-1672883552600-a2bfa0a34fbf?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'title' => 'Apple Watch Series 9',
                'description' => 'Smartwatch with fitness tracking and heart rate monitor.',
                'price' => 39999,
                'category' => 'Electronics',
                'image_url' => 'https://images.unsplash.com/photo-1705307543536-06ebcb39bb0c?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8QXBwbGUlMjBXYXRjaCUyMFNlcmllcyUyMDl8ZW58MHx8MHx8fDA%3D',
            ],
            [
                'title' => 'Samsung Galaxy Buds Pro',
                'description' => 'Noise-canceling wireless earbuds with immersive sound.',
                'price' => 15999,
                'category' => 'Electronics',
                'image_url' => 'https://images.unsplash.com/photo-1659353669431-36aabcf09054?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'title' => 'H&M Cotton T-Shirt',
                'description' => 'Basic crew-neck t-shirt made from organic cotton.',
                'price' => 499,
                'category' => 'Clothing',
                'image_url' => 'https://plus.unsplash.com/premium_photo-1726866090726-5b4ef17652a2?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'title' => 'Fossil Leather Wallet',
                'description' => 'Slim bifold wallet made from genuine leather.',
                'price' => 2499,
                'category' => 'Accessories',
                'image_url' => 'https://images.unsplash.com/photo-1512414947060-048d53abb081?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Rm9zc2lsJTIwTGVhdGhlciUyMFdhbGxldHxlbnwwfHwwfHx8MA%3D%3D',
            ],
            [
                'title' => 'Sony WH-1000XM5 Headphones',
                'description' => 'Industry-leading noise canceling over-ear headphones.',
                'price' => 29999,
                'category' => 'Electronics',
                'image_url' => 'https://plus.unsplash.com/premium_photo-1677838847721-2bf14b48c256?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'title' => 'Puma Suede Classic Sneakers',
                'description' => 'Retro-inspired sneakers with suede upper.',
                'price' => 3499,
                'category' => 'Footwear',
                'image_url' => 'https://images.unsplash.com/photo-1602504968646-5e26fd0725d4?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8UHVtYSUyMFN1ZWRlJTIwQ2xhc3NpYyUyMFNuZWFrZXJzfGVufDB8fDB8fHww',
            ],
            [
                'title' => 'Uniqlo Ultra Light Down Jacket',
                'description' => 'Lightweight and packable down jacket for warmth.',
                'price' => 4999,
                'category' => 'Clothing',
                'image_url' => 'https://images.unsplash.com/photo-1742735618034-8d924c3455a0?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'title' => 'Timex Weekender Watch',
                'description' => 'Casual analog watch with interchangeable strap.',
                'price' => 2999,
                'category' => 'Accessories',
                'image_url' => 'https://images.unsplash.com/photo-1734776584677-7cbbec4475f9?q=80&w=2126&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'title' => 'Dell XPS 13 Laptop',
                'description' => 'Compact and powerful ultrabook with InfinityEdge display.',
                'price' => 99999,
                'category' => 'Electronics',
                'image_url' => 'https://images.unsplash.com/photo-1694278963820-eaf19e9fb646?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'title' => 'Nike Dri-FIT Running Shorts',
                'description' => 'Lightweight shorts with moisture-wicking fabric.',
                'price' => 1999,
                'category' => 'Clothing',
                'image_url' => 'https://images.unsplash.com/photo-1623285512357-ff3b9a7579ea?q=80&w=1965&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'title' => 'Casio G-Shock Digital Watch',
                'description' => 'Durable and shock-resistant digital watch.',
                'price' => 5999,
                'category' => 'Accessories',
                'image_url' => 'https://images.unsplash.com/photo-1734776581165-ac7684b91a1b?q=80&w=1940&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'title' => 'Bose SoundLink Revolve+ Speaker',
                'description' => 'Portable Bluetooth speaker with 360° sound.',
                'price' => 19999,
                'category' => 'Electronics',
                'image_url' => 'https://plus.unsplash.com/premium_photo-1677159499898-b061fb5bd2d7?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'title' => 'Adidas Originals Trefoil Hoodie',
                'description' => 'Comfortable hoodie with iconic Trefoil logo.',
                'price' => 3999,
                'category' => 'Clothing',
                'image_url' => 'https://plus.unsplash.com/premium_photo-1670871853648-966298a8e252?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'title' => 'Herschel Little America Backpack',
                'description' => 'Stylish backpack with drawstring closure and laptop sleeve.',
                'price' => 6999,
                'category' => 'Accessories',
                'image_url' => 'https://images.unsplash.com/photo-1705541012132-be2c02458c38?q=80&w=1936&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'title' => 'Canon EOS M50 Mirrorless Camera',
                'description' => 'Compact mirrorless camera with 4K video recording.',
                'price' => 57999,
                'category' => 'Electronics',
                'image_url' => 'https://images.unsplash.com/photo-1631652645581-a4bc83d8911b?q=80&w=1965&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
        ];

        foreach ($products as $p) {
            $product = Product::create($p);

            $variants = ['Red', 'Black'];
            foreach ($variants as $variant) {
                $product->inventories()->create([
                    'variant' => $variant,
                    'quantity' => rand(10, 25),
                ]);
            }
        }
    }
}
