<?php

namespace App\Observers;

class InvoiceObserver
{
    //handle after updating event
    public function updating($invoice)
    {
        /**
         * delete the invoice if total_amount is zero
         */
        if ($invoice->total_amount == 0) {
            $invoice->delete();
        }
    }
}
