<?php

namespace App\Livewire\Account;

use App\Models\Account;
use Livewire\Component;

class AccountPanel extends Component
{

    public $account;

    public function mount($account)
    {
        $this->account = Account::find($account);
    }

    public function loadAccountBalance($accountId)
    {
        $this->dispatch(
            'showAccountBalance',
            accountId: $accountId
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
