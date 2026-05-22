<?php

namespace App\Livewire\Account;

use App\Models\Account;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Manager extends Component
{

    use WithPagination;

    public $sortBy = 'date';
    public $sortDirection = 'desc';
    public $paginate = 10;

    public function sort($column)
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function accounts()
    {
        return Account::query()
            ->tap(fn($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
            ->paginate($this->paginate);
    }

    public function editAccount(Account $account)
    {
        $this->dispatch(
            'editAccount',
            account: $account
        );
    }

    #[On('accountListUpdated')]
    public function refreshList() {}


    public function render()
    {
        return view('livewire.account.manager');
    }
}
