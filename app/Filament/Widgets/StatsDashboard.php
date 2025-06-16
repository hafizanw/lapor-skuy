<?php

namespace App\Filament\Widgets;

use App\Models\Complaint;
use App\Models\ComplaintDepartment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsDashboard extends BaseWidget
{
    protected function getStats(): array
    {
        $jumlahaduan = Complaint::count();
        $aduanSelesai = ComplaintDepartment::where('proses', 'selesai')->count();
        $aduanPending = ComplaintDepartment::where('proses', 'diajukan')->count(); 
        return [
            Stat::make('Jumlah Aduan', $jumlahaduan . ' Aduan')
                ->description('Jumlah total yang belum direview')
                ->icon('heroicon-o-document-text')
                ->color('info'),
            Stat::make('Aduan Selesai', $aduanSelesai . ' Aduan')
                ->description('Jumlah aduan yang telah selesai diproses')
                ->color('success')
                ->icon('heroicon-o-check-circle'),
            Stat::make('Diajukan', $aduanPending . ' Aduan')
                ->description('Jumlah aduan yang masih dalam proses')
                ->color('danger')
                ->icon('heroicon-o-clock'),
        ];
    }
}
