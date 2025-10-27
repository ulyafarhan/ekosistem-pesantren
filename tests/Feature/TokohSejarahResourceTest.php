<?php

namespace Tests\Feature\Filament;

use App\Filament\Resources\TokohSejarahResource;
use App\Models\TokohSejarah;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class TokohSejarahResourceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAs(User::factory()->create(['email' => 'admin@pesantren.com']));
    }

    public function test_can_render_tokoh_sejarah_list_page(): void
    {
        $this->get(TokohSejarahResource::getUrl('index'))->assertSuccessful();
    }

    public function test_can_list_tokoh_sejarah(): void
    {
        $records = TokohSejarah::factory()->count(5)->create();

        Livewire::test(TokohSejarahResource\Pages\ListTokohSejarahs::class)
            ->assertCanSeeTableRecords($records);
    }

    public function test_can_render_tokoh_sejarah_create_page(): void
    {
        $this->get(TokohSejarahResource::getUrl('create'))->assertSuccessful();
    }

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
        ]);

        Storage::disk('public')->assertExists('tokoh-sejarah/' . $file->hashName());
    }

    public function test_can_render_tokoh_sejarah_edit_page(): void
    {
        $record = TokohSejarah::factory()->create();
        $this->get(TokohSejarahResource::getUrl('edit', ['record' => $record]))->assertSuccessful();
    }

    public function test_can_update_tokoh_sejarah(): void
    {
        $record = TokohSejarah::factory()->create();
        $newData = TokohSejarah::factory()->make();

        Livewire::test(TokohSejarahResource\Pages\EditTokohSejarah::class, [
            'record' => $record->getRouteKey(),
        ])
        ->fillForm([
            'nama_lengkap' => $newData->nama_lengkap,
            'periode_jabatan' => $newData->periode_jabatan,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

        $this->assertDatabaseHas('tokoh_sejarahs', [
            'id' => $record->id,
            'nama_lengkap' => $newData->nama_lengkap,
        ]);
    }

    public function test_can_delete_tokoh_sejarah(): void
    {
        $record = TokohSejarah::factory()->create();

        Livewire::test(TokohSejarahResource\Pages\EditTokohSejarah::class, [
            'record' => $record->getRouteKey(),
        ])
        ->callAction(\Filament\Actions\DeleteAction::class);

        $this->assertModelMissing($record);
    }
}