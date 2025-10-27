<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeriodePendaftaranResource\Pages;
use App\Filament\Resources\PeriodePendaftaranResource\RelationManagers;
use App\Models\PeriodePendaftaran;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\Wizard;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Filament\Resources\PeriodePendaftaranResource\RelationManagers\KontakPanitiaRelationManager;

class PeriodePendaftaranResource extends Resource
{
    protected static ?string $model = PeriodePendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $pluralModelLabel = 'Periode Pendaftaran';
    protected static ?string $modelLabel = 'Periode Pendaftaran';
    protected static ?string $navigationLabel = 'Periode Pendaftaran';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Wizard::make([
                Step::make('Detail Periode')
                    ->schema([
                        Forms\Components\TextInput::make('tahun_ajaran')->required(),
                        Forms\Components\DatePicker::make('tanggal_buka')->required(),
                        Forms\Components\DatePicker::make('tanggal_tutup')->required(),
                        Forms\Components\Select::make('status')
                            ->options([
                                'dibuka' => 'Dibuka',
                                'ditutup' => 'Ditutup',
                                'akan_datang' => 'Akan Datang',
                            ])
                            ->required(),
                    ]),
                Step::make('Konten Brosur')
                    ->schema([
                        RichEditor::make('brosur.sejarah')->columnSpanFull(),
                        RichEditor::make('brosur.visi_misi')->columnSpanFull(),
                        RichEditor::make('brosur.kurikulum_formal')->columnSpanFull(),
                        RichEditor::make('brosur.kurikulum_non_formal')->columnSpanFull(),
                        RichEditor::make('brosur.jadwal_kbm')->columnSpanFull(),
                        RichEditor::make('brosur.biaya')->columnSpanFull(),
                        RichEditor::make('brosur.syarat_pendaftaran')->columnSpanFull(),
                    ]),
            ])->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun_ajaran')->searchable(),
                Tables\Columns\TextColumn::make('tanggal_buka')->date(),
                Tables\Columns\TextColumn::make('tanggal_tutup')->date(),
                Tables\Columns\TextColumn::make('status')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'dibuka' => 'success',
                        'ditutup' => 'danger',
                        'akan_datang' => 'warning',
                    }),
            ])
            ->filters([
                //
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
            KontakPanitiaRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeriodePendaftarans::route('/'),
            'create' => Pages\CreatePeriodePendaftaran::route('/create'),
            'edit' => Pages\EditPeriodePendaftaran::route('/{record}/edit'),
        ];
    }
}