<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Actions\UpdateRecordBalancesAction;

class refreshAccount extends Command
{
    protected $updateRecordBalancesAction;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:refresh-account {accountId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recalcula a conta desde o primeiro registro até o último, atualizando o saldo e o valor total.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $accountId = $this->argument('accountId');
        $firstRecord = \App\Models\Record::where('account_id', $accountId)
            ->orderBy('due_date', 'asc')
            ->first();

        if (!$firstRecord) {
            $this->error("Conta {$accountId} não encontrada.");
            return;
        }

        $updateRecordBalancesAction = new UpdateRecordBalancesAction();
        $this->info("Recalculando conta.. {$accountId}.");
        $updateRecordBalancesAction($firstRecord);
        $this->info("Conta {$accountId} recalculada com sucesso.");
    }
}
