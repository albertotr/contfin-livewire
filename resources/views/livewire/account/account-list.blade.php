<div
    class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 rounded-xl border border-neutral-200 dark:border-neutral-700 gap-4 p-4">
    @foreach ($accounts as $account)
        <livewire:account.account-panel :account="$account->id" :key="$account->id" />
    @endforeach
</div>
