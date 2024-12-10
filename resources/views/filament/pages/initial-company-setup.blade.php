<x-filament-panels::page>
    <div class="space-y-6">
        <div class="text-center">
            <h2 class="text-2xl font-bold">Selamat Datang di Panel Perusahaan</h2>
            <p class="mt-2">Silakan lengkapi data perusahaan Anda untuk melanjutkan</p>
        </div>

        <form wire:submit="create">
            {{ $this->form }}

            <div class="mt-6 flex justify-center">
                <x-filament::button type="submit" size="lg">
                    Simpan Data Perusahaan
                </x-filament::button>
            </div>
        </form>
    </div>
</x-filament-panels::page>
