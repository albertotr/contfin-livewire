<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'mercado',
            'description' => 'compra feitas no mercado para consumo em casa'
        ]);

        Category::create([
            'name' => 'refeição',
            'description' => 'compra feitas no mercado para consumo em casa'
        ]);

        Category::create([
            'name' => 'pesca',
            'description' => 'compra feitas no mercado para consumo em casa'
        ]);

        Category::create([
            'name' => 'bicileta',
            'description' => 'compra feitas no mercado para consumo em casa'
        ]);

        Category::create([
            'name' => 'diverso',
            'description' => 'compra feitas no mercado para consumo em casa'
        ]);
    }
}
