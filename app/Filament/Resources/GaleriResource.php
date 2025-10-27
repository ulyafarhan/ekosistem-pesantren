<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriResource\Pages;
use App\Models\Galeri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\View\TablesRenderHook;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;

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
                    ->live(),

                Forms\Components\FileUpload::make('file_media')
                    ->label('Upload Foto')
                    ->multiple()
                    ->image()
                    ->reorderable()
                    ->appendFiles()
                    ->directory('galeri')
                    ->panelLayout('grid')
                    ->visible(fn (callable $get) => $get('tipe') === 'foto'),

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
                Tables\Columns\ImageColumn::make('file_media')
                    ->label('Media')
                    ->circular()
                    ->limit(3)
                    ->limitedRemainingText()
                    ->visible(fn (?Galeri $record): bool => $record?->tipe === 'foto'),
                Tables\Columns\TextColumn::make('file_media.0')
                    ->label('Video URL')
                    ->url(fn (?Galeri $record): string => $record?->file_media[0] ?? '')
                    ->openUrlInNewTab()
                    ->visible(fn (?Galeri $record): bool => $record?->tipe === 'video'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('view_media')
                    ->label('Lihat Media')
                    ->icon('heroicon-o-eye')
                    ->modalContent(fn (Galeri $record) => view('filament.resources.galeri-resource.view-media', ['record' => $record]))
                    ->modalSubmitAction(false)
                    ->modalCancelAction(false)
                    ->visible(fn (Galeri $record): bool => $record->tipe === 'foto' && !empty($record->file_media)),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function fillForm(Model $record): void
    {
        parent::fillForm($record);

        if ($record->tipe === 'video') {
            $record->video_url = $record->file_media[0] ?? null;
        }
    }

    protected static function mutateFormDataBeforeCreate(array $data): array
    {
        if ($data['tipe'] === 'video') {
            $data['file_media'] = [$data['video_url']];
        }

        unset($data['video_url']);

        return $data;
    }

    protected static function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['tipe'] === 'video') {
            $data['file_media'] = [$data['video_url']];
        }

        unset($data['video_url']);

        return $data;
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