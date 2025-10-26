<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriResource\Pages;
use App\Models\Galeri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $pluralModelLabel = 'Galeri';
    protected static ?string $modelLabel = 'Galeri';
    protected static ?string $navigationLabel = 'Galeri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required(),
                Forms\Components\Textarea::make('deskripsi')
                    ->columnSpanFull(),
                Forms\Components\Select::make('tipe')
                    ->options([
                        'foto' => 'Foto',
                        'video' => 'Video',
                    ])
                    ->required()
                    ->live(), // Tambahkan live() agar UI reaktif
                
                // NAMA UNIK 1: 'photo_upload'
                Forms\Components\FileUpload::make('photo_upload')
                    ->label('Upload Foto')
                    ->image()
                    ->directory('galeri')
                    ->visible(fn (callable $get) => $get('tipe') === 'foto'),

                // NAMA UNIK 2: 'video_url'
                Forms\Components\TextInput::make('video_url')
                    ->label('URL Video (YouTube/Vimeo)')
                    ->url()
                    ->visible(fn (callable $get) => $get('tipe') === 'video'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')->searchable(),
                Tables\Columns\TextColumn::make('tipe')->badge(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
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


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGaleris::route('/'),
            'create' => Pages\CreateGaleri::route('/create'),
            'edit' => Pages\EditGaleri::route('/{record}/edit'),
        ];
    }
}