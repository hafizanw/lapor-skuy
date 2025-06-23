<?php

namespace App\Filament\Resources\ComplaintHistoryResource\Pages;

use App\Filament\Resources\ComplaintHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComplaintHistories extends ListRecords
{
    protected static string $resource = ComplaintHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
