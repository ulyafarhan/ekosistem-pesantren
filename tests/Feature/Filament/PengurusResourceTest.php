<?php

use App\Filament\Resources\PengurusResource;
use App\Models\Pengurus;
use App\Models\User;
// 1. Tambahkan use statement ini
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Livewire\livewire;

// 2. Gunakan trait RefreshDatabase
uses(RefreshDatabase::class);

// Setup: Jalankan ini sebelum setiap test
beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('can render the list page', function () {
    $this->get(PengurusResource::getUrl('index'))->assertSuccessful();
});

it('can render the create page', function () {
    $this->get(PengurusResource::getUrl('create'))->assertSuccessful();
});

it('can render the edit page', function () {
    $pengurus = Pengurus::factory()->create();
    $this->get(PengurusResource::getUrl('edit', ['record' => $pengurus]))
        ->assertSuccessful();
});

it('can create a new pengurus', function () {
    $newPengurusData = Pengurus::factory()->make();

    livewire(PengurusResource\Pages\CreatePengurus::class)
        ->fillForm([
            'nama_lengkap' => $newPengurusData->nama_lengkap,
            'jabatan' => $newPengurusData->jabatan,
            'biografi_singkat' => $newPengurusData->biografi_singkat,
            'foto' => null, // 3. Tambahkan baris ini
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas('penguruses', [ // Pastikan nama tabel plural
        'nama_lengkap' => $newPengurusData->nama_lengkap,
    ]);
});

it('can update a pengurus', function () {
    $pengurus = Pengurus::factory()->create();
    $newData = Pengurus::factory()->make();

    livewire(PengurusResource\Pages\EditPengurus::class, [
        'record' => $pengurus->getRouteKey(),
    ])
        ->fillForm([
            'nama_lengkap' => $newData->nama_lengkap,
            'jabatan' => $newData->jabatan,
            'biografi_singkat' => $newData->biografi_singkat,
            'foto' => null, // 4. Tambahkan baris ini
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas('penguruses', [ // Pastikan nama tabel plural
        'id' => $pengurus->id,
        'nama_lengkap' => $newData->nama_lengkap,
    ]);
});

it('can delete a pengurus', function () {
    $pengurus = Pengurus::factory()->create();

    livewire(PengurusResource\Pages\EditPengurus::class, [
        'record' => $pengurus->getRouteKey(),
    ])
    ->callAction('delete')
    ->assertHasNoErrors();

    $this->assertDatabaseMissing('penguruses', [ // Pastikan nama tabel plural
        'id' => $pengurus->id,
    ]);
});