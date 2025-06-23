<?php

namespace App\Filament\Widgets;

use App\Models\Complaint;
use App\Models\ComplaintHistory;
use Filament\Widgets\ChartWidget;
use App\Models\Laporan;

class StatusChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static ?string $maxHeight = '300px';
    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        // Jumlah semua laporan yang berada di history, kelompokkan berdasarkan tanggal dibuat
        $laporanSelesai = ComplaintHistory::selectRaw('DATE(created_at) as tanggal, COUNT(id) as total')
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        // Siapkan data untuk chart
        $labels = $laporanSelesai->pluck('tanggal')->toArray();
        $data = $laporanSelesai->pluck('total')->toArray();

        return [
            'datasets' => [
            [
                'label' => 'Total Laporan Selesai',
                'data' => $data,
            ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
