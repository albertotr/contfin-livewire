<?php

namespace App\Observers;

use App\Models\Record;
use App\Actions\UpdateRecordBalancesAction;

class RecordObserver
{
    protected $updateBalancesAction;

    public function __construct(UpdateRecordBalancesAction $updateBalancesAction)
    {
        $this->updateBalancesAction = $updateBalancesAction;
    }

    /**
     * Handle the Record "created" event.
     */
    public function created(Record $record): void
    {
        ($this->updateBalancesAction)($record);
    }

    /**
     * Handle the Record "updated" event.
     */
    public function updated(Record $record): void
    {
        ($this->updateBalancesAction)($record);
    }

    /**
     * Handle the Record "deleted" event.
     */
    public function deleted(Record $record): void
    {
        ($this->updateBalancesAction)($record);
    }

    /**
     * Handle the Record "restored" event.
     */
    public function restored(Record $record): void
    {
        //
    }

    /**
     * Handle the Record "force deleted" event.
     */
    public function forceDeleted(Record $record): void
    {
        //
    }
}
