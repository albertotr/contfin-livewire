<?php

namespace App\Actions;

use App\Models\Record;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class UpdateAccountBalancesAction
{
    /**
     * Atualiza o saldo e o saldo estimado a partir do registro anterior.
     *
     * @param Account $account
     * @return void
     */
    public function __invoke(Account $account)
    {
        // Inicia uma transação para garantir consistência no banco de dados
        DB::transaction(function () use ($account) {

            $record = Record::latest('due_date')
                ->where('account_id', $account->id)
                ->first();
            $account->update([
                'balance' => $record->balance,
                'estimate' => $record->estimate,
            ]);
        });
    }
}
