<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Account;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Card::create([
            'name' => 'NuBank UltraVioleta',
            'close_day' => 16,
            'payment_day' => 23,
            'account_id' => Account::where('name', 'NuBank')->first()->id,
        ]);

        Card::create([
            'name' => 'Itau Black',
            'close_day' => 16,
            'payment_day' => 23,
            'account_id' => Account::where('name', 'Itau')->first()->id,
        ]);
    }
}
