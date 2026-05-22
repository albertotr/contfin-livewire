<?php

namespace App\Livewire\Account;

use App\Models\Account;
use Flux\Flux;
use Livewire\Component;

class Form extends Component
{
    public ?Account $account = null;
    public string $name = '';
    public bool $isEditMode = true;

    protected $listeners = [
        'editAccount' => 'loadAccount',
    ];

    public function loadAccount(Account $account)
    {
        $this->account = $account;
        $this->name = $account?->name ?? '';
        $this->isEditMode = true;
    }

    public function mount(?Account $account = null)
    {
        $this->account = $account;
        $this->name = $account?->name ?? '';
        $this->isEditMode = false;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3'
        ]);

        try {
            if ($this->account?->id) {
                $this->account->update([
                    'name' => $this->name,
                ]);
            } else {

                $account = Account::withTrashed()
                    ->where('name', $this->name)
                    ->first();

                if ($account) {

                    // restore if was soft-deleted
                    $account->restore();
                } else {

                    // CREATE
                    Account::create([
                        'name' => $this->name
                    ]);
                }
            }
        } catch (\Throwable $th) {
            Flux::toast(
                heading: 'Error saving changes.',
                text: 'An error occurred while saving the account. Please try again.',
                variant: 'error'
            );
            return;
        }

        Flux::toast(
            heading: 'Changes saved.',
            text: 'Your account has been saved successfully.',
            variant: 'success'
        );
        $this->dispatch('accountListUpdated');
        $this->resetForm();
    }

    public function deleteAccount()
    {
        if (!$this->account?->id) {
            return;
        }

        try {
            $this->account->delete();
        } catch (\Throwable $th) {
            Flux::toast(
                heading: 'Error deleting account.',
                text: 'An error occurred while deleting the account. Please try again.',
                variant: 'error'
            );
            return;
        }

        Flux::toast(
            heading: 'Account deleted.',
            text: 'The account has been deleted successfully.',
            variant: 'success'
        );
        $this->dispatch('accountListUpdated');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset();

        $this->account = null;

        $this->name = '';

        $this->isEditMode = false;

        $this->resetValidation();

        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.account.form');
    }
}
