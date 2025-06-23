<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComplaintHistoryResource\Pages;
use App\Filament\Resources\ComplaintHistoryResource\RelationManagers;
use App\Models\ComplaintHistory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComplaintHistoryResource extends Resource
{
    protected static ?string $model = ComplaintHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-check';

    protected static ?string $navigationGroup = 'Kelola Aduan';
    protected static ?int $navigationSort = 3;
    protected static ?string $slug = 'aduan-history';
    protected static ?string $navigationLabel = 'Aduan Selesai';
    protected static ?string $modelLabel = 'Aduan Selesai';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('attachment_path')
                    ->label('Lampiran Aduan')
                    ->url(fn($record) => $record->attachment ? asset('storage/' . $record->attachment->path_file) : null)
                    ->circular()
                    ->size(50)
                    ->alignCenter(),
                // Tables\Columns\TextColumn::make('rating.rating')
                //     ->label('Rating')
                //     ->sortable()
                //     ->searchable(),
                Tables\Columns\TextColumn::make('user_name')
                    ->label('Nama Pelapor')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('complaint_title')
                    ->label('Judul Pengaduan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('complaint_content')
                    ->label('Isi Pengaduan')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('department_role')
                    ->label('Penangung Jawab')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('response')
                    ->label('Tanggapan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Selesai')
                    ->dateTime()
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComplaintHistories::route('/'),
            'create' => Pages\CreateComplaintHistory::route('/create'),
            'edit' => Pages\EditComplaintHistory::route('/{record}/edit'),
        ];
    }
}
