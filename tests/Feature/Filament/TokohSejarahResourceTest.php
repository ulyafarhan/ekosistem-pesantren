<?php

use App\Filament\Resources\TokohSejarahResource;
use App\Models\TokohSejarah;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use function Pest\Livewire\livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('can render the list page', function () {
    $this->get(TokohSejarahResource::getUrl('index'))->assertSuccessful();
});

it('can render the create page', function () {
    $this->get(TokohSejarahResource::getUrl('create'))->assertSuccessful();
});

it('can render the edit page', function () {
    $tokoh = TokohSejarah::factory()->create();
    $this->get(TokohSejarahResource::getUrl('edit', ['record' => $tokoh]))->assertSuccessful();
});

public function test_can_create_tokoh_sejarah(): void
{
    Storage::fake('public');
    $file = UploadedFile::fake()->image('avatar.jpg');

    $newData = TokohSejarah::factory()->make();

    Livewire::test(TokohSejarahResource\Pages\CreateTokohSejarah::class)
        ->fillForm([
            'nama_lengkap' => $newData->nama_lengkap,
            'periode_jabatan' => $newData->periode_jabatan,
            'kisah_historis' => $newData->kisah_historis,
        ])
        ->set('data.foto', $file)
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas('tokoh_sejarahs', [
        'nama_lengkap' => $newData->nama_lengkap,
        'periode_jabatan' => $newData->periode_jabatan,
        'kisah_historis' => $newData->kisah_historis,
    ]);

    $tokoh = TokohSejarah::first();
    Storage::disk('public')->assertExists('tokoh-sejarah/' . $file->hashName());
}

public function test_can_update_tokoh_sejarah(): void
{
    $record = TokohSejarah::factory()->create();
    $newData = TokohSejarah::factory()->make();
    Storage::fake('public');
    $newFile = UploadedFile::fake()->image('new_avatar.jpg');

    Livewire::test(TokohSejarahResource\Pages\EditTokohSejarah::class, [
        'record' => $record->getRouteKey(),
    ])
    ->fillForm([
        'nama_lengkap' => $newData->nama_lengkap,
        'periode_jabatan' => $newData->periode_jabatan,
        'kisah_historis' => $newData->kisah_historis,
    ])
    ->set('data.foto', $newFile)
    ->call('save')
    ->assertHasNoFormErrors();

    $this->assertDatabaseHas('tokoh_sejarahs', [
        'id' => $record->id,
        'nama_lengkap' => $newData->nama_lengkap,
        'periode_jabatan' => $newData->periode_jabatan,
        'kisah_historis' => $newData->kisah_historis,
    ]);

    Storage::disk('public')->assertExists('tokoh-sejarah/' . $newFile->hashName());
}

it('can delete a tokoh sejarah', function () {
    $tokoh = TokohSejarah::factory()->create();

    livewire(TokohSejarahResource\Pages\EditTokohSejarah::class, [
        'record' => $tokoh->getRouteKey(),
    ])
    ->callAction('delete')
    ->assertHasNoErrors();

    $this->assertDatabaseMissing('tokoh_sejarahs', [
        'id' => $tokoh->id,
    ]);
});