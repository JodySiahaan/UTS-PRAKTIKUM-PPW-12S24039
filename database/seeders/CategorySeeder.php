<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Server & Cloud',       'code' => 'SRV'],
            ['name' => 'Internet of Things',   'code' => 'IOT'],
            ['name' => 'Multimedia & Drone',   'code' => 'DRN'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['code' => $category['code']], $category);
        }
    }
}