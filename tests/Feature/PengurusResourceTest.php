<?php

namespace Tests\Feature\Filament;

use App\Filament\Resources\PengurusResource;
use App\Models\Pengurus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class PengurusResourceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAs(User::factory()->create(['email' => 'admin@pesantren.com']));
        Storage::fake('public');
    }

    public function test_can_render_pengurus_list_page(): void
    {
        $this->get(PengurusResource::getUrl('index'))->assertSuccessful();
    }

    public function test_can_list_pengurus(): void
    {
        $penguruses = Pengurus::factory()->count(5)->create();

        Livewire::test(PengurusResource\Pages\ListPenguruses::class)
            ->assertCanSeeTableRecords($penguruses);
    }

    public function test_can_render_pengurus_create_page(): void
    {
        $this->get(PengurusResource::getUrl('create'))->assertSuccessful();
    }

    public function test_can_create_pengurus(): void
    {
        $file = UploadedFile::fake()->image('avatar.jpg');

        Livewire::test(PengurusResource\Pages\CreatePengurus::class)
            ->fillForm([
                'nama_lengkap' => 'Nama Lengkap Baru',
                'biografi_singkat' => 'Biografi singkat di sini.',
                'jabatan' => 'Ketua Umum',
                'foto' => $file,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('penguruses', [
            'nama_lengkap' => 'Nama Lengkap Baru',
            'jabatan' => 'Ketua Umum',
        ]);

        $pengurus = Pengurus::first();
        Storage::disk('public')->assertExists($pengurus->foto);
    }

    public function test_can_render_pengurus_edit_page(): void
    {
        $pengurus = Pengurus::factory()->create();
        $this->get(PengurusResource::getUrl('edit', ['record' => $pengurus]))->assertSuccessful();
    }

    public function test_can_update_pengurus(): void
    {
        $pengurus = Pengurus::factory()->create();
        $newFile = UploadedFile::fake()->image('new_avatar.jpg');

        Livewire::test(PengurusResource\Pages\EditPengurus::class, [
            'record' => $pengurus->getRouteKey(),
        ])
        ->fillForm([
            'nama_lengkap' => 'Nama Diperbarui',
            'jabatan' => 'Wakil Ketua',
            'foto' => $newFile,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

        $this->assertDatabaseHas('penguruses', [
            'id' => $pengurus->id,
            'nama_lengkap' => 'Nama Diperbarui',
        ]);
    }

    public function test_can_delete_pengurus(): void
    {
        $pengurus = Pengurus::factory()->create();

        Livewire::test(PengurusResource\Pages\EditPengurus::class, [
            'record' => $pengurus->getRouteKey(),
        ])
        ->callAction(\Filament\Actions\DeleteAction::class);

        $this->assertModelMissing($pengurus);
    }
}