<x-filament::page>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        {{-- Kiri: Foto & Kartu --}}
        <div class="lg:col-span-2 flex flex-wrap gap-4 items-stretch">
            {{-- Foto User --}}
            <div class="bg-white rounded-xl overflow-hidden shadow flex justify-center items-center p-4 w-60 h-60">
                <img src="{{ asset('assets/image/user.png') }}" style="height: 300px; width:300px"
                    class=" object-cover">
            </div>

            {{-- Kartu Identitas --}}
            <div class="bg-white rounded-xl overflow-hidden shadow w-60 h-60 flex flex-col">
                <div class="bg-green-100 flex items-center justify-center h-1/2">
                    <img src="{{ asset('assets/image/card.png') }}" class="w-full h-full object-cover">
                </div>
                <div class="p-4 text-center flex-1 flex flex-col justify-center">
                    <p class="font-bold text-sm text-green-800">0011 01022 010602</p>
                    <p class="text-gray-700 text-sm">Nada Nabilah Luthfiyah</p>
                </div>
            </div>

            {{-- Saldo --}}
            <div class="flex flex-col gap-4 w-60 h-60">
                <!-- Saldo Tunai -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow flex flex-col justify-center items-center text-center space-y-2 flex-1">
                    <p class="text-gray-500 text-sm">Saldo Tunai</p>
                    <img src="{{ asset('assets/image/money-bill.png') }}" class="w-14 h-14 object-cover">
                    <p class="text-xl font-bold text-green-700 p-2">Rp 137.000.000,-</p>
                </div>

                <!-- Saldo Emas -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow flex flex-col justify-center items-center text-center space-y-2 flex-1">
                    <p class="text-gray-500 text-sm">Saldo Emas</p>
                    <img src="{{ asset('assets/image/gold.png') }}" class="w-14 h-14 object-cover">
                    <p class="text-xl font-bold text-green-700 p-2">0,7 Gram</p>
                </div>
            </div>
            <div class="bg-white rounded-xl overflow-hidden shadow w-60 h-60 flex flex-col">
                <div class="bg-white rounded-xl overflow-hidden shadow flex-1 p-4 flex flex-col justify-between">
                    <!-- Tombol Aksi -->
                    <div class="flex justify-between items-center mb-4">
                        <button
                            class="bg-lime-600/10 text-lime-800 text-xs px-3 py-2 rounded-lg flex items-center gap-1">
                            <x-heroicon-o-adjustments-horizontal class="w-4 h-4" />
                            Juni - Juli 2025
                        </button>
                    </div>
                    <!-- Box Grafik -->
                    <div class="bg-white shadow rounded-xl p-4 flex-1 flex items-center justify-center text-gray-400">
                        <img src="{{ asset('assets/image/user.png') }}" style="height: 250px; width:250px"
                    class=" object-cover">
                    </div>
                </div>
            </div>


        </div>

        {{-- Riwayat --}}
        <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white shadow rounded-xl p-6">
                <h2 class="font-semibold text-lg mb-4">Riwayat Transaksi</h2>
                {{--
                <livewire:riwayat-transaksi /> --}}
                <p class="text-gray-400 text-sm">Belum ada data transaksi.</p>
            </div>

            <div class="bg-white shadow rounded-xl p-6">
                <h2 class="font-semibold text-lg mb-4">Riwayat Kegiatan</h2>
                {{--
                <livewire:riwayat-kegiatan /> --}}
                <p class="text-gray-400 text-sm">Belum ada data kegiatan.</p>
            </div>
        </div>
</x-filament::page>