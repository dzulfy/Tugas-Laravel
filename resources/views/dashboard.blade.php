<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Dashboard</h2></x-slot>
 
    <div class="py-8 space-y-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-4 gap-4">
            <x-card>
                <p class="text-xs text-gray-500">Omzet Hari Ini</p>
                <p class="text-xl font-semibold">Rp{{ number_format($omzetHariIni, 0, ',', '.') }}</p>
            </x-card>
            <x-card>
                <p class="text-xs text-gray-500">Omzet Kemarin</p>
                <p class="text-xl font-semibold">Rp{{ number_format($omzetKemarin, 0, ',', '.') }}</p>
            </x-card>
            <x-card>
                <p class="text-xs text-gray-500">Transaksi Hari Ini</p>
                <p class="text-xl font-semibold">{{ $transaksiHariIni }}</p>
            </x-card>
            <x-card>
                <p class="text-xs text-gray-500">Produk Stok Menipis</p>
                <p class="text-xl font-semibold text-yellow-600">{{ $produkMenipis }}</p>
            </x-card>
        </div>
 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3 gap-6">
            <!-- Wrapper dengan tinggi tetap agar canvas Chart.js ter-render dengan sempurna -->
            <x-card class="col-span-2">
                <h3 class="font-semibold mb-3">Tren Penjualan 7 Hari Terakhir</h3>
                <div class="relative w-full h-72">
                    <canvas id="chartTren"></canvas>
                </div>
            </x-card>
 
            <x-card>
                <h3 class="font-semibold mb-3">Produk Terlaris</h3>
                <ol class="list-decimal list-inside space-y-1 text-sm">
                    @foreach ($produkTerlaris as $produk)
                        <li>{{ $produk->name }} <span class="text-gray-500">({{ $produk->total_qty }} terjual)</span></li>
                    @endforeach
                </ol>
            </x-card>
        </div>
    </div>
 
    @push('scripts')
    <!-- Menggunakan CDN Chart.js agar bypass masalah Vite module loading -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const labelsData = @json($labelTren);
            const valuesData = @json($dataTren);

            const ctx = document.getElementById('chartTren').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labelsData,
                    datasets: [{
                        label: 'Penjualan (Rp)',
                        data: valuesData,
                        borderColor: '#4f46e5',
                        backgroundColor: 'rgba(79, 70, 229, 0.1)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });
        });
    </script>
    @endpush
</x-app-layout>