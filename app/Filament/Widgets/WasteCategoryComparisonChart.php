<?php

namespace App\Filament\Widgets;

use App\Models\WasteDepositItem;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class WasteCategoryComparisonChart extends ChartWidget
{
    protected static ?string $heading = 'Perbandingan Kategori Sampah per Bulan';
    protected static ?int $sort = 4;

    protected function getData(): array
    {
        // Ambil 6 bulan terakhir dalam format Y-m
        $months = collect(range(0, 5))
            ->map(fn($i) => now()->subMonths($i)->format('Y-m'))
            ->reverse()
            ->values();

        // Ambil semua kategori unik dari tabel waste_items
        $categories = DB::table('waste_items')
            ->distinct()
            ->pluck('category')
            ->filter()
            ->unique()
            ->values();

        // Ambil data agregat jumlah sampah per kategori dan bulan
        $results = WasteDepositItem::selectRaw('
                DATE_FORMAT(waste_deposits.deposit_date, "%Y-%m") as month,
                waste_items.category as category,
                SUM(waste_deposit_items.quantity) as total
            ')
            ->join('waste_deposits', 'waste_deposit_items.waste_deposit_id', '=', 'waste_deposits.id')
            ->join('waste_items', 'waste_deposit_items.waste_item_id', '=', 'waste_items.id')
            ->whereIn(DB::raw('DATE_FORMAT(waste_deposits.deposit_date, "%Y-%m")'), $months)
            ->groupBy('month', 'category')
            ->orderBy('month')
            ->get();

        // Bangun dataset berdasarkan kategori
        $datasets = [];

        foreach ($categories as $category) {
            $data = $months->map(function ($month) use ($results, $category) {
                $record = $results->first(fn($r) => $r->month === $month && $r->category === $category);
                return $record ? (float) $record->total : 0;
            });

            $datasets[] = [
                'label' => $category,
                'data' => $data,
                'backgroundColor' => $this->getColorForCategory($category),
            ];
        }

        return [
            'labels' => $months->toArray(),
            'datasets' => $datasets,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    private function getColorForCategory(string $category): string
    {
        return match ($category) {
            'Organik' => 'rgba(75, 192, 192, 0.8)',
            'Plastik' => 'rgba(255, 99, 132, 0.8)',
            'Logam' => 'rgba(255, 206, 86, 0.8)',
            'Kertas' => 'rgba(54, 162, 235, 0.8)',
            default => 'rgba(153, 102, 255, 0.8)',
        };
    }
}
