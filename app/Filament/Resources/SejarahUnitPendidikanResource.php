<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SejarahUnitPendidikanResource\Pages;
use App\Models\SejarahUnitPendidikan;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;


class SejarahUnitPendidikanResource extends Resource
{
    protected static ?string $model = SejarahUnitPendidikan::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $navigationGroup = 'Sejarah & Struktur';

    protected static ?string $pluralModelLabel = 'Sejarah Unit Pendidikan';
    protected static ?string $modelLabel = 'Sejarah Unit Pendidikan';
    protected static ?string $navigationLabel = 'Sejarah Unit Pendidikan';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Sejarah SMP')
                    ->schema([
                        RichEditor::make('sejarah_smp')
                            ->label('Konten Sejarah SMP')
                            ->columnSpanFull()
                    ]),
                Section::make('Sejarah SMA')
                    ->schema([
                        RichEditor::make('sejarah_sma')
                            ->label('Konten Sejarah SMA')
                            ->columnSpanFull() 
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sejarah_smp')->limit(50) ->html(),
                Tables\Columns\TextColumn::make('sejarah_sma')->limit(50) ->html(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSejarahUnitPendidikans::route('/'),
            'create' => Pages\CreateSejarahUnitPendidikan::route('/create'),
            'edit' => Pages\EditSejarahUnitPendidikan::route('/{record}/edit'),
        ];
    }
}