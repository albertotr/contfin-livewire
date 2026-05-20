<?php

namespace App\Actions;

class CurrencyToCentsAction
{
    /**
     *
     *
     * @param String $currency
     * @return void
     */
    public function __invoke(String $currency): int
    {
        $amount = (int) round(floatval(str_replace(',', '.', str_replace('.', '', $currency))) * 100);
        return $amount;
    }
}
