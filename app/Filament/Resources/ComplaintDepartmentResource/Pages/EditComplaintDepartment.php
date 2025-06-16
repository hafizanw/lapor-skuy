<?php

namespace App\Filament\Resources\ComplaintDepartmentResource\Pages;

use App\Filament\Resources\ComplaintDepartmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComplaintDepartment extends EditRecord
{
    protected static string $resource = ComplaintDepartmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
