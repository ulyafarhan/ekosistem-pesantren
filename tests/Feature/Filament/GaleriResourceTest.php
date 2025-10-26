<?php

use App\Filament\Resources\GaleriResource;
use App\Models\Galeri;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Livewire\livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('can render the list page', function () {
    $this->get(GaleriResource::getUrl('index'))->assertSuccessful();
});

it('can render the create page', function () {
    $this->get(GaleriResource::getUrl('create'))->assertSuccessful();
});

it('can render the edit page', function () {
    $galeri = Galeri::factory()->create();
    $this->get(GaleriResource::getUrl('edit', ['record' => $galeri]))->assertSuccessful();
});

it('can create a new galeri item', function () {
    $newData = Galeri::factory()->make(['tipe' => 'video']);

    livewire(GaleriResource\Pages\CreateGaleri::class)
        ->fillForm([
            'judul' => $newData->judul,
            'deskripsi' => $newData->deskripsi,
            'tipe' => $newData->tipe,
            'video_url' => $newData->file_media,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas('galeris', [
        'judul' => $newData->judul,
        'file_media' => $newData->file_media,
    ]);
});

it('can update a galeri item', function () {
    $galeri = Galeri::factory()->create(['tipe' => 'video']);
    $newData = Galeri::factory()->make(['tipe' => 'video']);

    // PERBAIKAN FINAL: Memanggil class EditGaleri yang benar
    livewire(GaleriResource\Pages\EditGaleri::class, [
        'record' => $galeri->getRouteKey(),
    ])
        ->fillForm([
            'judul' => $newData->judul,
            'deskripsi' => $newData->deskripsi,
            'tipe' => $newData->tipe,
            'video_url' => $newData->file_media,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas('galeris', [
        'id' => $galeri->id,
        'judul' => $newData->judul,
    ]);
});

it('can delete a galeri item', function () {
    $galeri = Galeri::factory()->create();

    // PERBAIKAN FINAL: Memanggil class EditGaleri yang benar
    livewire(GaleriResource\Pages\EditGaleri::class, [
        'record' => $galeri->getRouteKey(),
    ])
    ->callAction('delete')
    ->assertHasNoErrors();

    $this->assertDatabaseMissing('galeris', [
        'id' => $galeri->id,
    ]);
});