<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TokohSejarahResource\Pages;
use App\Filament\Resources\TokohSejarahResource\RelationManagers;
use App\Models\TokohSejarah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TokohSejarahResource extends Resource
{
    protected static ?string $model = TokohSejarah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralModelLabel = 'Tokoh Sejarah';
    protected static ?string $modelLabel = 'Tokoh Sejarah';
    protected static ?string $navigationLabel = 'Tokoh Sejarah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_lengkap')
                    ->required(),
                Forms\Components\TextInput::make('periode_jabatan')
                    ->required(),
                Forms\Components\TextInput::make('foto'),
                Forms\Components\Textarea::make('kisah_historis')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->searchable(),
                Tables\Columns\TextColumn::make('periode_jabatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('foto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListTokohSejarahs::route('/'),
            'create' => Pages\CreateTokohSejarah::route('/create'),
            'edit' => Pages\EditTokohSejarah::route('/{record}/edit'),
        ];
    }
}
