<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Enums\Type;
use App\Models\Record;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transacoes =  [
            [
                "due_date" => new Carbon('2024-01-01'),
                "description" => "inicial",
                "type" => Type::CREDITO,
                "amount" => 164210,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-2'),
                "description" => "Cerveja",
                "type" => Type::DEBITO,
                "amount" => 1500,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-2'),
                "description" => "Mais Pastel",
                "type" => Type::DEBITO,
                "amount" => 10819,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-2'),
                "description" => "IPTU NH",
                "type" => Type::DEBITO,
                "amount" => 108126,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-2'),
                "description" => "IPTU BOX1",
                "type" => Type::DEBITO,
                "amount" => 10647,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-2'),
                "description" => "IPTU BOX2",
                "type" => Type::DEBITO,
                "amount" => 10647,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-2'),
                "description" => "Gás",
                "type" => Type::DEBITO,
                "amount" => 3960,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-2'),
                "description" => "Melancia",
                "type" => Type::DEBITO,
                "amount" => 3800,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-5'),
                "description" => "farmácia",
                "type" => Type::DEBITO,
                "amount" => 1572,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-5'),
                "description" => "Taquareiras",
                "type" => Type::DEBITO,
                "amount" => 7870,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-6'),
                "description" => "Salario",
                "type" => Type::CREDITO,
                "amount" => 482900,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-6'),
                "description" => "CX Casa",
                "type" => Type::DEBITO,
                "amount" => 35000,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-6'),
                "description" => "CX Lucca",
                "type" => Type::DEBITO,
                "amount" => 50000,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-6'),
                "description" => "FullTime",
                "type" => Type::DEBITO,
                "amount" => 55000,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-6'),
                "description" => "Contas Casa",
                "type" => Type::DEBITO,
                "amount" => 110000,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-6'),
                "description" => "BikeFit Fabex",
                "type" => Type::DEBITO,
                "amount" => 9500,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-6'),
                "description" => "compra",
                "type" => Type::DEBITO,
                "amount" => 500,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-6'),
                "description" => "Presente Lucca",
                "type" => Type::DEBITO,
                "amount" => 4941,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-7'),
                "description" => "Abastecimento Ana",
                "type" => Type::DEBITO,
                "amount" => 13265,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-7'),
                "description" => "Estacionamento aeroporto",
                "type" => Type::DEBITO,
                "amount" => 2200,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-11'),
                "description" => "corte cabelo",
                "type" => Type::DEBITO,
                "amount" => 5000,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-12'),
                "description" => "Lavagem do Caroo",
                "type" => Type::DEBITO,
                "amount" => 6000,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-12'),
                "description" => "Cerveja",
                "type" => Type::DEBITO,
                "amount" => 5000,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-15'),
                "description" => "Saque",
                "type" => Type::DEBITO,
                "amount" => 10000,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-16'),
                "description" => "1/2 Pilates",
                "type" => Type::DEBITO,
                "amount" => 12500,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-18'),
                "description" => "Curso Azure Udemy",
                "type" => Type::DEBITO,
                "amount" => 2790,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-20'),
                "description" => "Adiantamento",
                "type" => Type::CREDITO,
                "amount" => 308300,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-19'),
                "description" => "Citronela",
                "type" => Type::DEBITO,
                "amount" => 7400,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-20'),
                "description" => "zaffari Canoas",
                "type" => Type::DEBITO,
                "amount" => 568,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-22'),
                "description" => "Receita Certa",
                "type" => Type::CREDITO,
                "amount" => 11771,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-23'),
                "description" => "Wise Remédio",
                "type" => Type::DEBITO,
                "amount" => 10000,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-23'),
                "description" => "Wise Remédio",
                "type" => Type::DEBITO,
                "amount" => 11059,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-25'),
                "description" => "Apartamento",
                "type" => Type::DEBITO,
                "amount" => 369108,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-25'),
                "description" => "Melhoria AP",
                "type" => Type::DEBITO,
                "amount" => 28834,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-25'),
                "description" => "Fabiano Haubert - Lavagem Carro",
                "type" => Type::DEBITO,
                "amount" => 6000,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-26'),
                "description" => "saque",
                "type" => Type::DEBITO,
                "amount" => 20000,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-26'),
                "description" => "Cerveja Rose",
                "type" => Type::DEBITO,
                "amount" => 4200,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-26'),
                "description" => "flores Jamile",
                "type" => Type::DEBITO,
                "amount" => 5000,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-27'),
                "description" => "Almoço",
                "type" => Type::DEBITO,
                "amount" => 7980,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-28'),
                "description" => "padaria Sao Chico",
                "type" => Type::DEBITO,
                "amount" => 3501,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-28'),
                "description" => "pagamento",
                "type" => Type::DEBITO,
                "amount" => 2000,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2024-01-31'),
                "description" => "presente Humberto",
                "type" => Type::DEBITO,
                "amount" => 2000,
                "account_id" => 1,
                "due" => true,
                "category_id" => 5
            ],
            [
                "due_date" => new Carbon('2023-12-10'),
                "description" => "Aleatory",
                "type" => Type::DEBITO,
                "amount" => 5000,
                "account_id" => 2,
                "due" => true,
                "category_id" => 5
            ]
        ];

        // Inserir as transações no banco de dados
        foreach ($transacoes as $transacao) {
            $horaAleatoria = rand(0, 23);
            $minutoAleatorio = rand(0, 59);
            $segundoAleatorio = rand(0, 59);

            $transacao['due_date']->setTime($horaAleatoria, $minutoAleatorio, $segundoAleatorio);
            Record::create($transacao);
        }
    }
}
