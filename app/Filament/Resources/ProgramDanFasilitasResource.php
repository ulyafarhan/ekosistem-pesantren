<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramDanFasilitasResource\Pages;
use App\Filament\Resources\ProgramDanFasilitasResource\RelationManagers;
use App\Models\ProgramDanFasilitas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;

class ProgramDanFasilitasResource extends Resource
{
    protected static ?string $model = ProgramDanFasilitas::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Akademik & Pendaftaran';

    protected static ?string $pluralModelLabel = 'Program dan Fasilitas';
    protected static ?string $modelLabel = 'Program dan Fasilitas';
    protected static ?string $navigationLabel = 'Program dan Fasilitas';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            RichEditor::make('program_pendidikan')
                ->columnSpanFull(),
            RichEditor::make('fasilitas')
                ->columnSpanFull(),
            FileUpload::make('gambar')
                ->label('Gambar Utama Program')
                ->image()
                ->directory('program-fasilitas')
                ->columnSpanFull()
                ->nullable(),            
            FileUpload::make('gambar_fasilitas')
                ->label('Gambar Utama Fasilitas')
                ->image()
                ->directory('program-fasilitas') 
                ->columnSpanFull()
                ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('program_pendidikan')->limit(50) ->html(),
                Tables\Columns\TextColumn::make('fasilitas')->limit(50) ->html(),
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
            'index' => Pages\ListProgramDanFasilitas::route('/'),
            'create' => Pages\CreateProgramDanFasilitas::route('/create'),
            'edit' => Pages\EditProgramDanFasilitas::route('/{record}/edit'),
        ];
    }
}