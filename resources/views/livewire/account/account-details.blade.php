<div class="relative h-full overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 shadow-sm transition dark:border-neutral-700 dark:bg-zinc-900">
    @if ($account)
        <div class="space-y-6">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-white">{{ $account->name }}</h2>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">Detalhes da conta selecionada</p>
                </div>
                <span class="rounded-full bg-teal-50 px-3 py-1 text-sm font-semibold text-teal-700 dark:bg-teal-900/20 dark:text-teal-200">
                    Conta #{{ $account->id }}
                </span>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div class="rounded-3xl bg-neutral-50 p-4 dark:bg-zinc-800">
                    <p class="text-xs uppercase tracking-[0.18em] text-zinc-400">Saldo atual</p>
                    <p class="mt-2 text-3xl font-semibold {{ $account->balance >= 0 ? 'text-value-positive' : 'text-value-negative' }}">
                        R$ {{ number_format($account->balance, 2, ',', '.') }}
                    </p>
                </div>

                <div class="rounded-3xl bg-neutral-50 p-4 dark:bg-zinc-800">
                    <p class="text-xs uppercase tracking-[0.18em] text-zinc-400">Saldo previsto</p>
                    <p class="mt-2 text-3xl font-semibold {{ $account->estimate >= 0 ? 'text-value-positive' : 'text-value-negative' }}">
                        R$ {{ number_format($account->estimate, 2, ',', '.') }}
                    </p>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div class="rounded-3xl bg-neutral-50 p-4 dark:bg-zinc-800">
                    <p class="text-xs uppercase tracking-[0.18em] text-zinc-400">Registros</p>
                    <p class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">{{ $account->records()->count() }}</p>
                </div>

                <div class="rounded-3xl bg-neutral-50 p-4 dark:bg-zinc-800">
                    <p class="text-xs uppercase tracking-[0.18em] text-zinc-400">Cartões</p>
                    <p class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">{{ $account->cards()->count() }}</p>
                </div>
            </div>

            <div class="rounded-3xl bg-neutral-50 p-4 dark:bg-zinc-800">
                <p class="text-xs uppercase tracking-[0.18em] text-zinc-400">Informações</p>
                <div class="mt-3 space-y-2 text-sm text-zinc-600 dark:text-zinc-300">
                    <p><span class="font-semibold text-slate-900 dark:text-white">Criada em:</span> {{ optional($account->created_at)->format('d/m/Y H:i') ?? '—' }}</p>
                    <p><span class="font-semibold text-slate-900 dark:text-white">Atualizada em:</span> {{ optional($account->updated_at)->format('d/m/Y H:i') ?? '—' }}</p>
                </div>
            </div>
        </div>
    @else
        <div class="absolute inset-0 flex items-center justify-center px-6 text-center text-sm text-neutral-500 dark:text-neutral-400">
            Selecione uma conta no painel à esquerda para ver os detalhes aqui.
        </div>
    @endif
</div>
