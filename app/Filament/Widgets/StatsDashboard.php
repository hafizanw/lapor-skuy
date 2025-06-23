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

class StatsDashboard extends BaseWidget
{
    protected function getStats(): array
    {
        $jumlaadmin = Admin::count();
        $jumlahuser = User::count();
        $jumlahdepartemen = Department::distinct('role')->count('role');
        return [
            Stat::make('Administrator', $jumlaadmin . ' Admin')
                ->icon('heroicon-o-wrench-screwdriver')
                ->color('info'),
            Stat::make('Pengguna', $jumlahuser . ' User')
                ->color('danger')
                ->icon('heroicon-o-user'),
            Stat::make('Penanggung Jawab', $jumlahdepartemen . ' Departemen')
                ->color('success')
                ->icon('heroicon-o-building-office'),
        ];

    }
}
