<!-- criar um form usando fluxui para gerenciar as contas -->

<div>
    <form wire:submit="save" class="space-y-4">

        <flux:input wire:model="name" label="Nome" placeholder="Digite o nome" />

        <div class="flex gap-3">

            <!-- SUBMIT -->

            <flux:button type="submit" variant="primary" class="w-20">
                {{ $isEditMode ? 'Atualizar' : 'Salvar' }}
            </flux:button>

            <!-- RESET -->

            @if ($isEditMode)
                <flux:button type="button" variant="filled" wire:click="resetForm" class="w-20">
                    Clear
                </flux:button>

                <flux:button type="button" variant="danger" wire:click="deleteAccount" class="w-20">
                    Delete
                </flux:button>
            @endif

        </div>


    </form>
</div>
