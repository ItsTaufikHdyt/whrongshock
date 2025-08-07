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
                    <p class="font-bold text-sm text-green-800">{{$user->number}}</p>
                    <p class="text-gray-700 text-sm">{{$user->name}}</p>
                </div>
            </div>

            {{-- Saldo --}}
            <div class="flex flex-col gap-4 w-60 h-60">
                <!-- Saldo Tunai -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow flex flex-col justify-center items-center text-center space-y-2 flex-1">
                    <p class="text-gray-500 text-sm">Saldo Tunai</p>
                    <img src="{{ asset('assets/image/money-bill.png') }}" class="w-14 h-14 object-cover">
                    <p class="text-xl font-bold text-green-700 p-2">Rp {{ number_format($user->balance ?? 0, 0, ',',
                        '.') }},-</p>
                </div>

                <!-- Saldo Emas -->
                <div
                    class="bg-white rounded-xl overflow-hidden shadow flex flex-col justify-center items-center text-center space-y-2 flex-1">
                    <p class="text-gray-500 text-sm">Saldo Emas</p>
                    <img src="{{ asset('assets/image/gold.png') }}" class="w-14 h-14 object-cover">
                    <p class="text-xl font-bold text-green-700 p-2">{{ number_format($saldoEmas, 2, ',', '.') }} Gram</p>
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
                <h2 class="font-semibold text-lg text-center mb-4">Riwayat Transaksi</h2>
                <table class="w-full text-sm text-left border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="p-2">Tanggal</th>
                            <th class="p-2">Total Setoran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $trx)
                        <tr class="border-b">
                            <td class="p-2">{{ \Carbon\Carbon::parse($trx->deposit_date)->format('d M Y') }}</td>
                            <td class="p-2">Rp {{ number_format($trx->total_amount, 0, ',', '.') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="p-2 text-center text-gray-500">Belum ada transaksi</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="bg-white shadow rounded-xl p-6">
                <h2 class="font-semibold text-lg text-center mb-4">Riwayat Kegiatan</h2>
                <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="border-b">
                        <th class="p-2">Tanggal</th>
                        <th class="p-2">Jenis Sampah</th>
                        <th class="p-2">Jumlah (Kg)</th>
                        <th class="p-2">Subtotal (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($wasteHistory as $deposit)
                    @foreach ($deposit->items as $item)
                    <tr class="border-b">
                        <td class="p-2">{{ \Carbon\Carbon::parse($deposit->deposit_date)->format('d M Y') }}</td>
                        <td class="p-2">{{ $item->wasteItem->category ?? '-' }}</td>
                        <td class="p-2">{{ $item->quantity }}</td>
                        <td class="p-2">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                    @empty
                    <tr>
                        <td colspan="4" class="p-2 text-center text-gray-500">Belum ada kegiatan setor limbah</td>
                    </tr>
                    @endforelse
                </tbody>
                </table>
            </div>
        </div>
</x-filament::page>