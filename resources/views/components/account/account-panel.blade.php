<div class="dark:bg-zinc-800/80 backdrop-blur rounded-2xl p-6 shadow-lg border dark:border-zinc-700/50 w-full max-w-md">

    <!-- Header -->
    <div class="flex items-start justify-between mb-4">
        <h2 class="text-lg font-semibold text-teal-suave">
            {{ $account->name }}
        </h2>

        <button class="text-zinc-400 hover:text-gray-600">
            ⋯
        </button>
    </div>

    <!-- Saldo atual -->
    <div class="mb-3">
        <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide">
            Saldo atual
        </p>

        <div class="flex items-center gap-3">
            @php
                $isPositive = $account->balance >= 0;
            @endphp
            <span class="text-3xl font-bold {{ $isPositive ? 'text-value-positive' : 'text-value-negative' }} ">
                R$ {{ number_format($account->balance, 2, ',', '.') }}
            </span>

        </div>
    </div>

    <!-- Saldo previsto -->
    <div>
        <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide">
            Saldo previsto
        </p>

        @php
            $isPositiveEstimate = $account->estimate >= 0;
        @endphp
        <span
            class="text-lg font-semibold text-gray-700 {{ $isPositiveEstimate ? 'text-value-positive' : 'text-value-negative' }}">
            R$ {{ number_format($account->estimate, 2, ',', '.') }}
        </span>
    </div>

</div>
