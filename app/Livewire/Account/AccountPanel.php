<?php

namespace App\Livewire\Account;

use App\Models\Account;
use Livewire\Component;

class AccountPanel extends Component
{

    public $account;

    public function mount(Account $account)
    {
        $this->account = $account;
    }

    public function loadAccountBalance(Account $account)
    {
        $this->dispatch(
            'showAccountBalance',
            account: $account
        );
    }

    /**
     * Create a new component instance.
     */
    public function render()
    {
        return view('livewire.account.account-panel');
    }
}
