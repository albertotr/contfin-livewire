<div class="h-full flex flex-col gap-4">
    <div class="h-1/3 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 px-4 py-2">

        <flux:table :paginate="$this->accounts()" container:class="h-full">
            <flux:table.columns sticky class="bg-white dark:bg-zinc-900">
                <flux:table.column>Customer</flux:table.column>
                <flux:table.column sortable :sorted="$sortBy === 'balance'" :direction="$sortDirection"
                    wire:click="sort('balance')">Balance</flux:table.column>
                <flux:table.column sortable :sorted="$sortBy === 'estimate'" :direction="$sortDirection"
                    wire:click="sort('estimate')">Estimate</flux:table.column>
            </flux:table.columns>

            <flux:table.rows>
                @foreach ($this->accounts() as $account)
                    <flux:table.row :key="$account->id" wire:click="editAccount({{ $account->id }})">
                        <flux:table.cell class="flex items-center gap-3">
                            {{ $account->name }}
                        </flux:table.cell>

                        <flux:table.cell>
                            <flux:badge size="sm" :color="$account->balance" inset="top bottom">
                                {{ $account->balance }}</flux:badge>
                        </flux:table.cell>

                        <flux:table.cell variant="strong">{{ $account->estimate }}</flux:table.cell>

                    </flux:table.row>
                @endforeach
            </flux:table.rows>
        </flux:table>

    </div>

    <div class="flex-1 min-h-0 overflow-auto rounded-xl border border-neutral-200 dark:border-neutral-700 p-4">
        <livewire:account.form />
    </div>
</div>
