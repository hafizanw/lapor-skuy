<?php

namespace App\Filament\Resources\ComplaintDepartmentResource\Pages;

use App\Filament\Resources\ComplaintDepartmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComplaintDepartments extends ListRecords
{
    protected static string $resource = ComplaintDepartmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
