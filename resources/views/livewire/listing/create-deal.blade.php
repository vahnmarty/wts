<div>
    <form wire:submit.prevent='submit'>
        {{ $this->form }}

        <div class="mt-8 flex items-center justify-center">
            <x-filament::button type="submit" size="xl">
                Submit Offer
            </x-filament::button>
        </div>
    </form>
</div>
