<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\ComplaintDepartment;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ComplaintDepartmentResource\Pages;
use App\Filament\Resources\ComplaintDepartmentResource\RelationManagers;

class ComplaintDepartmentResource extends Resource
{
    protected static ?string $model = ComplaintDepartment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Kelola Aduan';
    protected static ?int $navigationSort = 2;
    protected static ?string $slug = 'list-aduan';
    protected static ?string $navigationLabel = 'List Complaint';
    protected static ?string $modelLabel = 'List Aduan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\select::make('attachment_id')
                    ->label('Lampiran Aduan')
                    ->relationship('attachment', 'real_name_file')
                    ->preload(),

                Forms\Components\TextInput::make('complaint_title')
                    ->label('Judul Pengaduan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('complaint_content')
                    ->label('Isi Pengaduan')
                    ->required()
                    ->columnSpan(2)
                    ->rows(3)
                    ->maxLength(1000),
                Forms\Components\Select::make('category_id')
                    ->label('Kategori Pengaduan')
                    ->relationship('category', 'visibility_type')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->label('Pelapor')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('proses')
                    ->label('Status Proses')
                    ->options([
                        'diajukan' => 'Diajukan',
                        'diproses' => 'Diproses',
                        'selesai' => 'Selesai',
                        'ditolak' => 'Ditolak',
                    ])
                    ->default('diajukan')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('attachment.path_file')
                ->label('Lampiran Aduan')
                ->url(fn ($record) => $record->attachment ? asset('storage/' . $record->attachment->path_file) : null)
                ->circular()
                ->size(50)
                ->alignCenter(),
            Tables\Columns\TextColumn::make('complaint_title')
                ->label('Judul Pengaduan')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('complaint_content')
                ->label('Isi Pengaduan')
                ->searchable()
                ->limit(50),
            Tables\Columns\TextColumn::make('category.visibility_type')
                ->label('Kategori Pengaduan')
                ->searchable()
                ->alignCenter()
                ->sortable(),
            Tables\Columns\TextColumn::make('user.name')
                ->label('Nama Pelapor')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('proses')
                ->label('Status')
                ->badge() // mengubah kolom menjadi badge
                ->color(fn (string $state): string => match ($state) {
                    'draft' => 'gray', // Warna abu-abu untuk status 'draft'
                    'diajukan' => 'info', // Warna biru muda untuk 'diajukan'
                    'diproses' => 'warning', // Warna kuning untuk 'diproses'
                    'selesai' => 'success', // Warna hijau untuk 'selesai'
                    'ditolak' => 'danger', // Warna merah untuk 'ditolak'
                    default => 'gray', // Warna default jika status tidak dikenal
                }),
            Tables\Columns\SelectColumn::make('department_id')
                ->label('Penangung Jawab')
                ->options([
                    '1' => 'Test',
                    '2' => 'DAAK',
                    '3' => 'Keuangan',
                ])
                ->sortable()
                ->searchable(),
            ])
            ->filters([
                SelectFilter::make('department_id')
                    ->label('Department')
                    ->options([
                        '1' => 'Test',
                        '2' => 'DAAK',
                        '3' => 'Keuangan',
                    ]),
                SelectFilter::make('category.visibility_type')
                    ->label('Kategori Pengaduan')
                    ->relationship('category', 'visibility_type')
                    ->options([
                        'Umum' => 'Umum',
                        'Privat' => 'Privat',
                    ]),
                SelectFilter::make('proses')
                    ->label('Status')
                    ->options([
                        'diajukan' => 'Diajukan',
                        'diproses' => 'Diproses',
                        'selesai' => 'Selesai',
                        'ditolak' => 'Ditolak',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListComplaintDepartments::route('/'),
            'create' => Pages\CreateComplaintDepartment::route('/create'),
            'edit' => Pages\EditComplaintDepartment::route('/{record}/edit'),
        ];
    }
}
