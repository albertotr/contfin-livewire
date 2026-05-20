<?php

namespace App\Actions;

use App\Enums\Type;
use App\Models\Record;
use App\Models\Account;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Actions\UpdateAccountBalancesAction;

class UpdateRecordBalancesAction
{
    /**
     *
     *
     * @param Record $record
     * @return void
     */
    public function __invoke(Record $record)
    {
        // Inicia uma transação para garantir consistência no banco de dados
        DB::transaction(function () use ($record) {

            // Encontra o registro anterior ao registro atual (com base na entry_date)
            $previousRecord = Record::where('due_date', '<', $record->due_date)
                ->where('account_id', $record->account_id)
                ->orderBy('due_date', 'desc')
                ->first();

            // Define os saldos iniciais
            $currentBalance = $previousRecord ? $previousRecord->balance : 0;
            $estimatedBalance = $previousRecord ? $previousRecord->estimate : 0;

            // Obtém todos os registros a partir do registro atual (incluindo ele mesmo)
            $subsequentRecords = Record::where('due_date', '>=', $record->due_date)
                ->where('account_id', $record->account_id)
                ->orderBy('due_date')
                ->get();

            // Itera sobre os registros subsequentes e atualiza os saldos
            foreach ($subsequentRecords as $r) {
                Log::warning($r->toArray());
                // Atualiza o saldo estimado
                if ($r->type == Type::CREDITO) $estimatedBalance += $r->amount;
                else $estimatedBalance -= $r->amount;

                // Atualiza o saldo apenas se o registro estiver efetivado
                if ($r->due) {
                    if ($r->type == Type::CREDITO) $currentBalance += $r->amount;
                    else $currentBalance -= $r->amount;
                }

                // Atualiza os saldos no registro
                $r->updateQuietly([
                    'balance' => $currentBalance,
                    'estimate' => $estimatedBalance,
                ]);
            }

            $account = Account::find($record->account_id);
            $updateAccount = new UpdateAccountBalancesAction();
            $updateAccount($account);
        });
    }
}
