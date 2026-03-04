<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Account::create([
            'name' => 'Banco do Brasil',
            'balance' => 0,
            'estimate' => 0,
        ]);

        Account::create([
            'name' => 'NuBank',
            'balance' => 0,
            'estimate' => 0,
        ]);

        Account::create([
            'name' => 'Itau',
            'balance' => 0,
            'estimate' => 0,
        ]);
    }
}
