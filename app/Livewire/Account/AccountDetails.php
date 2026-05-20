<?php

namespace App\Livewire\Account;

use App\Models\Account;
use Livewire\Attributes\On;
use Livewire\Component;

class AccountDetails extends Component
{
    public $account;

    protected $listeners = [
        'accountSelected' => 'loadAccount',
    ];

    public function mount()
    {
        $this->account = null;
    }

    #[On('showAccountBalance')]
    public function loadAccount($accountId)
    {
        $this->account = Account::find($accountId);
    }

    public function render()
    {
        return view('livewire.account.account-details');
    }
}
