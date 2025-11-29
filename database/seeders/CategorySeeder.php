<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Concert Tickets',
            'Festival Passes',
            'Sports Tickets',
            'Event Meet & Greet',
            'Electronics',
            'Mobile Phones',
            'Laptops & Accessories',
            'Gaming & Consoles',
            'Fashion',
            'Sneakers',
            'Collectibles',
            'Trading Cards',
            'Digital Goods',
            'Services',
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
