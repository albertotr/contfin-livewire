<?php

namespace App\Livewire\Account;

use App\Models\Account;
use Livewire\Component;

class AccountList extends Component
{
    public $accounts;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->accounts = Account::all();
    }

    public function render()
    {
        return view('livewire.account.account-list');
    }
}
