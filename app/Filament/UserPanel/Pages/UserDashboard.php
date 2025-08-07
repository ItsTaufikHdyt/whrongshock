<?php

namespace App\Filament\UserPanel\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\WasteDeposit;

class UserDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.user-panel.pages.user-dashboard';
    protected static ?string $title = 'Dashboard';
    protected static ?string $navigationGroup = 'User Area';
    protected static ?int $navigationSort = 1;

    public $user;
    public $transactions;
    public $wasteHistory;
    public $saldoEmas;


    public function mount()
    {
        $this->user = Auth::user();
        $hargaEmas = 1943000; // harga per gram
        $saldoTunai = $this->user->balance; // dari database

        $this->saldoEmas = $saldoTunai / $hargaEmas;

        

        // Ambil 5 transaksi terakhir
        $this->transactions = WasteDeposit::where('user_id', $this->user->id)
            ->latest()
            ->take(5)
            ->get();

        // Ambil riwayat sampah
        $this->wasteHistory = WasteDeposit::with(['items.wasteItem'])
            ->where('user_id', $this->user->id)
            ->latest()
            ->take(10)
            ->get();
    }
}
