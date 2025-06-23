<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComplaintResource\Pages;
use App\Filament\Resources\ComplaintResource\RelationManagers;
use App\Models\Complaint;
use Filament\Forms\FormsComponents;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComplaintResource extends Resource
{
    protected static ?string $model = Complaint::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    protected static ?string $navigationGroup = 'Kelola Aduan';
    protected static ?int $navigationSort = 1;
    protected static ?string $slug = 'under-review';
    protected static ?string $navigationLabel = 'Belum Direview';
    protected static ?string $modelLabel = 'Belum Direview';

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
            Tables\Columns\TextColumn::make('voteCount')
                ->counts('votes')
                ->label('Jumlah Vote')
                // Hitung jumlah upvote dan downvote, lalu tampilkan selisihnya
                ->getStateUsing(function ($record) {
                    $upvotes = $record->votes()->where('vote_type', 'upvote')->count();
                    $downvotes = $record->votes()->where('vote_type', 'downvote')->count();
                    return $upvotes - $downvotes;
                })
                ->sortable(query: function (Builder $query, string $direction): Builder {
                    // Urutkan berdasarkan selisih upvote dan downvote
                    return $query
                        ->withCount([
                            'votes as upvotes_count' => function ($q) {
                                $q->where('vote_type', 'upvote');
                            },
                            'votes as downvotes_count' => function ($q) {
                                $q->where('vote_type', 'downvote');
                            },
                        ])
                        ->orderByRaw('(upvotes_count - downvotes_count) ' . $direction);
                })
                ->badge()
                ->alignCenter()
                ->icon('heroicon-o-user'),
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
            Tables\Columns\TextColumn::make('created_at')
                ->label('Tanggal Dibuat')
                ->dateTime()
                ->sortable(),
            ])
            ->filters([
                SelectFilter::make('category.visibility_type')
                    ->label('Kategori Pengaduan')
                    ->relationship('category', 'visibility_type')
                    ->options([
                        'public' => 'Public',
                        'private' => 'Private',
                    ]),
            ])
            ->actions([
                Tables\Actions\Action::make('throw')
                    ->label('Throw')
                    ->icon('heroicon-o-arrow-up-on-square-stack')
                    ->color('success')
                    ->visible(fn (Complaint $record): bool => $record->proses === 'draft') // Hanya terlihat jika status 'draft'
                    ->requiresConfirmation() // Minta konfirmasi sebelum aksi
                    ->action(function (Complaint $record) {
                        // 1. Ubah status menjadi 'diproses'
                        $record->update(['proses' => 'diajukan']);

                        // 2. Hapus data pada baris tersebut
                        $record->delete();

                        // Opsional: Berikan notifikasi
                        \Filament\Notifications\Notification::make()
                            ->title('Berhasil')
                            ->body('Aduan telah diajukan')
                            ->success()
                            ->send();
                    }),

                Tables\Actions\DeleteAction::make(),

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
            'index' => Pages\ListComplaints::route('/'),
            'create' => Pages\CreateComplaint::route('/create'),
            'edit' => Pages\EditComplaint::route('/{record}/edit'),
        ];
    }
}
