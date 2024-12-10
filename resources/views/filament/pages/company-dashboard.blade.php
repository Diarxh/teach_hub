<x-filament::page>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        {{-- Card Informasi Utama --}}
        <x-filament::card>
            <div class="flex items-center gap-4">
                <div class="flex-1">
                    <h2 class="text-lg font-bold tracking-tight">
                        Selamat Datang di Dashboard Perusahaan
                    </h2>
                    <p class="text-gray-500">
                        {{ auth()->user()->name }}
                    </p>
                </div>
            </div>
        </x-filament::card>

        {{-- Card Statistik --}}
        <x-filament::card>
            <div class="space-y-2">
                <div class="text-sm font-medium text-gray-500">
                    Total Data
                </div>
                <div class="text-3xl font-semibold">
                    {{ $totalData }}
                </div>
            </div>
        </x-filament::card>

        {{-- Card Info Perusahaan --}}
        <x-filament::card>
            <div class="space-y-2">
                <div class="text-sm font-medium text-gray-500">
                    Info Perusahaan
                </div>
                <div class="space-y-2">
                    <div class="text-sm">
                        <strong>Nama Perusahaan:</strong> {{ auth()->user()->company->company_name }}
                    </div>
                    <div class="text-sm">
                        <strong>Alamat:</strong> {{ auth()->user()->company->address }}
                    </div>
                    <div class="text-sm">
                        <strong>No. Telepon:</strong> {{ auth()->user()->company->phone_number }}
                    </div>
                </div>
            </div>
        </x-filament::card>

        {{-- Card Info Training Terbaru --}}
        <x-filament::card>
            <div class="space-y-2">
                <div class="text-sm font-medium text-gray-500">
                    Info Training Terbaru
                </div>
                <div class="space-y-2">
                    @if ($trainings->isEmpty())
                        <div class="text-sm">
                            Belum ada training yang dijadwalkan
                        </div>
                    @else
                        @foreach ($trainings as $training)
                            <div class="text-sm">
                                <strong>{{ $training->name }}</strong> - {{ $training->start_date->format('d M Y') }}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </x-filament::card>

    </div>

    {{-- Card Statistik Pelatihan per Bulan --}}
    <x-filament::card class="col-span-1 lg:col-span-3">
        <div class="space-y-2">
            <div class="text-sm font-medium text-gray-500">
                Statistik Pelatihan per Bulan
            </div>
            <div class="flex justify-center">
                <canvas id="trainingsPerMonthChart" class="w-full max-w-5xl"></canvas>
            </div>
        </div>
    </x-filament::card>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('trainingsPerMonthChart').getContext('2d');
            const chartData = {!! json_encode($trainingsPerMonth) !!};

            new Chart(ctx, {
                type: 'bar', // Jenis chart yang diinginkan
                data: {
                    labels: Object.keys(chartData), // Menampilkan bulan pada sumbu x
                    datasets: [{
                        label: 'Jumlah Pelatihan per Bulan',
                        data: Object.values(chartData), // Data dari bulan-bulan
                        backgroundColor: 'rgba(54, 162, 235, 0.2)', // Warna latar belakang batang chart
                        borderColor: 'rgba(54, 162, 235, 1)', // Warna border batang chart
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
            });
        </script>
    @endpush
</x-filament::page>
