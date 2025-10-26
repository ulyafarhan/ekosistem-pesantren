<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengurusResource\Pages;
use App\Filament\Resources\PengurusResource\RelationManagers;
use App\Models\Pengurus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengurusResource extends Resource
{
    protected static ?string $model = Pengurus::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralModelLabel = 'Pengurus';
    protected static ?string $modelLabel = 'Pengurus';
    protected static ?string $navigationLabel = 'Pengurus';

    /**
     * Define the form schema for the resource.
     *
     * @param Form $form
     * @return Form
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_lengkap')
                    ->required(),
                Forms\Components\Textarea::make('biografi_singkat')
                    ->nullable()
                    ->columnSpanFull(),
                Forms\Components\Select::make('jabatan')
                    ->options([
                        'Ketua Umum' => 'Ketua Umum',
                        'Wakil Ketua' => 'Wakil Ketua',
                        'Sekretaris' => 'Sekretaris',
                        'Bendahara' => 'Bendahara',
                        'Kepala Sekolah SMP' => 'Kepala Sekolah SMP',
                        'Kepala Sekolah SMA' => 'Kepala Sekolah SMA',
                        'Lainnya'=> 'Pengurus Lainnya/ Ustadz',
                    ])
                        ->required(),
                FileUpload::make('foto')
                    ->image()
                    ->directory('pengurus')
            ]);
    }

    /**
     * Define the table schema for the resource.
     *
     * @param Table $table
     * @return Table
     */

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')->circular(),
                Tables\Columns\TextColumn::make('nama_lengkap')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('jabatan')->searchable()->sortable()->badge(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPenguruses::route('/'),
            'create' => Pages\CreatePengurus::route('/create'),
            'edit' => Pages\EditPengurus::route('/{record}/edit'),
        ];
    }
}
