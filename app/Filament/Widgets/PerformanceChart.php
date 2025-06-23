<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class PerformanceChart extends ChartWidget
{
    protected static ?string $heading = 'Performa Departement';
    protected static ?string $maxHeight = '300px';
    protected int | string | array $columnSpan = 'full';

    // Untuk mengurutkan posisi pada widget
    public static function getSort(): int
    {
        return 2;
    }

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Rating',
                    'data' => [1, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89, 100],
                ],
            ],
            'labels' => ['DAAK', 'Keuangan', 'Hubungan Internasional', 'Innovation Center', 'LPM', 'Penelitian', 'Resource Center', 'UPT', 'BPC', 'Kemahasiswaaan', 'Hubungan Masyarakat', 'Pusat Jaminan Mutu', 'Sarana Prasarana'],
            
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
