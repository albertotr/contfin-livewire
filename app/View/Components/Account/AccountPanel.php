<?php

namespace App\View\Components\Account;

use App\Models\Account;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AccountPanel extends Component

{
    public $account;

    /**
     * Create a new component instance.
     */
    public function __construct(Account $account)
    {
        $this->account = $account;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.account.account-panel');
    }
}
