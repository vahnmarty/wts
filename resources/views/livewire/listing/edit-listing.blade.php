<div>

    <header>
        <h1 class="text-2xl font-bold">Edit Listing</h1>
        <p class="mt-1 text-sm text-neutral-700">Post something you can buy, sell or swap.</p>
    </header>

    <div class="mt-8 rounded-md border border-neutral-300 bg-white p-8 shadow-md">
        <div>
            <form wire:submit="submit">
                {{ $this->form }}

                <div class="mt-8 flex justify-end gap-4">
                    <x-filament::button wire:click="saveDraft" color="primary" outlined>
                        Save as Draft
                    </x-filament::button>
                    <x-filament::button wire:click="submit">
                        Update Listing
                    </x-filament::button>
                </div>
            </form>

            <x-filament-actions::modals />
        </div>
    </div>

</div>
