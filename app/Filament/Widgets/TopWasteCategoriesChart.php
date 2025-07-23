<?php

namespace App\Filament\Widgets;

use App\Models\WasteItem;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class TopWasteCategoriesChart extends ChartWidget
{
    protected static ?string $heading = 'Kategori Sampah Terbanyak';
    protected static ?int $sort = 1;

    protected function getData(): array
    {
        $data = WasteItem::select('category', DB::raw('SUM(waste_deposit_items.quantity) as total'))
            ->join('waste_deposit_items', 'waste_items.id', '=', 'waste_deposit_items.waste_item_id')
            ->groupBy('category')
            ->orderByDesc('total')
            ->limit(6)
            ->get();

        return [
            'labels' => $data->pluck('category')->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah (Kg)',
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => [
                        '#00b894', '#0984e3', '#d63031', '#e17055', '#6c5ce7', '#fdcb6e',
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => ['display' => true],
            ],
            'scales' => [
                'y' => ['beginAtZero' => true],
            ],
        ];
    }

    protected function getContentHeight(): ?string
    {
        return '300px'; // Bisa diubah sesuai tampilan
    }
}
