<?php

namespace App\Filament\Widgets;

use App\Models\Admin;
use App\Models\Complaint;
use App\Models\Department;
use App\Models\ComplaintHistory;
use App\Models\ComplaintDepartment;
use Illuminate\Foundation\Auth\User;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsProses extends BaseWidget
{
    protected function getStats(): array
    {
        $jumlahaduan = Complaint::count();
        $aduanSelesai = ComplaintHistory::count();
        $aduanPending = ComplaintDepartment::where('proses', 'diajukan')->count(); 
        return [
            Stat::make('Belum direview', $jumlahaduan . ' Aduan')
                ->description('Jumlah total yang belum direview')
                ->icon('heroicon-o-document-text')
                ->color('info'),
            Stat::make('Diproses', $aduanPending . ' Aduan')
                ->description('Jumlah aduan yang sedang diproses')
                ->color('danger')
                ->icon('heroicon-o-clock'),
            Stat::make('Aduan Selesai', $aduanSelesai . ' Aduan')
                ->description('Jumlah aduan yang telah selesai ditanggapi')
                ->color('success')
                ->icon('heroicon-o-check-circle'),
        ];
    }
}
