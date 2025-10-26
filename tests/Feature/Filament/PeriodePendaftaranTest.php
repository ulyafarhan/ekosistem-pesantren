<?php

use App\Filament\Resources\PeriodePendaftaranResource;
use App\Models\PeriodePendaftaran;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Livewire\livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->actingAs(User::factory()->create());
});


it('can render the list page', function () {
    $this->get(PeriodePendaftaranResource::getUrl('index'))->assertSuccessful();
});

it('can render the create page', function () {
    $this->get(PeriodePendaftaranResource::getUrl('create'))->assertSuccessful();
});

it('can render the edit page', function () {
    $periode = PeriodePendaftaran::factory()->create();
    $this->get(PeriodePendaftaranResource::getUrl('edit', ['record' => $periode]))->assertSuccessful();
});

it('can create a new periode', function () {
    $newData = PeriodePendaftaran::factory()->make();

    livewire(PeriodePendaftaranResource\Pages\CreatePeriodePendaftaran::class)
        ->fillForm([
            'tahun_ajaran' => $newData->tahun_ajaran,
            'tanggal_mulai' => $newData->tanggal_mulai,
            'tanggal_selesai' => $newData->tanggal_selesai,
            'status' => $newData->status,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas('periode_pendaftarans', [
        'tahun_ajaran' => $newData->tahun_ajaran,
    ]);
});

it('can update a periode', function () {
    $periode = PeriodePendaftaran::factory()->create();
    $newData = PeriodePendaftaran::factory()->make();

    livewire(PeriodePendaftaranResource\Pages\EditPeriodePendaftaran::class, [
        'record' => $periode->getRouteKey(),
    ])
        ->fillForm([
            'tahun_ajaran' => $newData->tahun_ajaran,
            'tanggal_mulai' => $newData->tanggal_mulai,
            'tanggal_selesai' => $newData->tanggal_selesai,
            'status' => $newData->status,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas('periode_pendaftarans', [
        'id' => $periode->id,
        'tahun_ajaran' => $newData->tahun_ajaran,
    ]);
});

it('can delete a periode', function () {
    $periode = PeriodePendaftaran::factory()->create();

    livewire(PeriodePendaftaranResource\Pages\EditPeriodePendaftaran::class, [
        'record' => $periode->getRouteKey(),
    ])
    ->callAction('delete')
    ->assertHasNoErrors();

    $this->assertDatabaseMissing('periode_pendaftarans', [
        'id' => $periode->id,
    ]);
});
