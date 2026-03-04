<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create([
            'name' => 'Importante',
            'description' => 'registro muito importante'
        ]);
        Tag::create([
            'name' => 'Parcelado',
            'description' => 'registro que foi parcelado'
        ]);
        Tag::create([
            'name' => 'PIX',
            'description' => 'registro que foi pago com PIX'
        ]);
        Tag::create([
            'name' => 'Periodico',
            'description' => 'registro de lancamento periodico'
        ]);
    }
}
