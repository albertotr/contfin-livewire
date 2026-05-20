<?php

namespace App\Actions;

use Carbon\Carbon;
use App\Enums\Type;
use App\Models\Record;
use App\Models\Account;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Actions\UpdateAccountBalancesAction;

class GetPaymentDateAction
{
    /**
     *
     *
     * @param String $currency
     * @return void
     */
    public function __invoke(Carbon $inputDate, $closingDay, $paymentDay): Carbon
    {
        // Obtém o ano e mês da data informada
        $year = $inputDate->year;
        $month = $inputDate->month;

        // Calcula a data de fechamento do cartão para o mês atual
        $closingDate = Carbon::create($year, $month, $closingDay);

        // Se a data informada for antes do fechamento, o pagamento será no mesmo mês
        if ($inputDate->lt($closingDate)) {
            $paymentDate = Carbon::create($year, $month, $paymentDay);
        } else {
            // Caso contrário, o pagamento será no próximo mês
            $nextMonth = $inputDate->copy()->addMonth();
            $paymentDate = Carbon::create($nextMonth->year, $nextMonth->month, $paymentDay);
        }

        return $paymentDate;
    }
}
