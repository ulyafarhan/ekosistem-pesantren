<?php

use App\Filament\Resources\BeritaResource;
use App\Models\Berita;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Livewire\livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('can render the list page', function () {
    $this->get(BeritaResource::getUrl('index'))->assertSuccessful();
});

it('can render the create page', function () {
    $this->get(BeritaResource::getUrl('create'))->assertSuccessful();
});

it('can render the edit page', function () {
    $berita = Berita::factory()->create();
    $this->get(BeritaResource::getUrl('edit', ['record' => $berita]))->assertSuccessful();
});

it('can create a new berita', function () {
    $newData = Berita::factory()->make();

    livewire(BeritaResource\Pages\CreateBerita::class)
        ->fillForm([
            'judul' => $newData->judul,
            'slug' => $newData->slug,
            'isi_konten' => $newData->isi_konten, // DIUBAH DARI 'isi'
            'status' => $newData->status,
            'kategori_berita' => 'Berita Sekolah',
            'gambar_utama' => null,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas('beritas', [
        'slug' => $newData->slug,
    ]);
});

it('can update a berita', function () {
    $berita = Berita::factory()->create();
    $newData = Berita::factory()->make();

    livewire(BeritaResource\Pages\EditBerita::class, [
        'record' => $berita->getRouteKey(),
    ])
        ->fillForm([
            'judul' => $newData->judul,
            'slug' => $newData->slug,
            'isi_konten' => $newData->isi_konten, // DIUBAH DARI 'isi'
            'status' => $newData->status,
            'kategori_berita' => 'Berita Sekolah',
            'gambar_utama' => null,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas('beritas', [
        'id' => $berita->id,
        'slug' => $newData->slug,
    ]);
});

it('can delete a berita', function () {
    $berita = Berita::factory()->create();

    livewire(BeritaResource\Pages\EditBerita::class, [
        'record' => $berita->getRouteKey(),
    ])
    ->callAction('delete')
    ->assertHasNoErrors();

    $this->assertDatabaseMissing('beritas', [
        'id' => $berita->id,
    ]);
});