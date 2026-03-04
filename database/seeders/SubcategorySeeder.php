<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subcategory::create([
            'name' => 'bourbon',
            'description' => 'compras feitas no Bourbom',
            'category_id' => Category::where('name', 'mercado')->pluck('id')->first()
        ]);
        Subcategory::create([
            'name' => 'Rissul',
            'description' => 'compras feitas no Rissul',
            'category_id' => Category::where('name', 'mercado')->pluck('id')->first()
        ]);
        Subcategory::create([
            'name' => 'Outros',
            'description' => 'Outro mercado qualquer',
            'category_id' => Category::where('name', 'mercado')->pluck('id')->first()
        ]);
        Subcategory::create([
            'name' => 'Trabalho',
            'description' => 'almoço em dia de trabalho',
            'category_id' => Category::where('name', 'refeição')->pluck('id')->first()
        ]);
        Subcategory::create([
            'name' => 'Lazer',
            'description' => 'almoço em dia de trabalho',
            'category_id' => Category::where('name', 'refeição')->pluck('id')->first()
        ]);
    }
}
