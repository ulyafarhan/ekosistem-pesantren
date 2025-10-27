<?php

namespace Tests\Feature\Filament;

use App\Filament\Resources\GaleriResource;
use App\Models\Galeri;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class GaleriResourceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAs(User::factory()->create(['email' => 'admin@pesantren.com']));
        Storage::fake('public');
    }

    public function test_can_render_galeri_list_page(): void
    {
        $this->get(GaleriResource::getUrl('index'))->assertSuccessful();
    }

    public function test_can_list_galeri(): void
    {
        $galeris = Galeri::factory()->count(5)->create();

        Livewire::test(GaleriResource\Pages\ListGaleris::class)
            ->assertCanSeeTableRecords($galeris);
    }

    public function test_can_render_galeri_create_page(): void
    {
        $this->get(GaleriResource::getUrl('create'))->assertSuccessful();
    }

    public function test_can_create_galeri_with_foto(): void
    {
        $file = UploadedFile::fake()->image('test.jpg');

        Livewire::test(GaleriResource\Pages\CreateGaleri::class)
            ->fillForm([
                'judul' => 'Judul Foto Baru',
                'deskripsi' => 'Deskripsi foto.',
                'tipe' => 'foto',
                'file_media' => [$file],
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('galeris', [
            'judul' => 'Judul Foto Baru',
            'deskripsi' => 'Deskripsi foto.',
            'tipe' => 'foto',
        ]);

        $galeri = Galeri::where('judul', 'Judul Foto Baru')->first();
        Storage::disk('public')->assertExists($galeri->file_media[0]);
    }

    public function test_can_create_galeri_with_video(): void
    {
        Livewire::test(GaleriResource\Pages\CreateGaleri::class)
            ->fillForm([
                'judul' => 'Judul Video Baru',
                'deskripsi' => 'Deskripsi video.',
                'tipe' => 'video',
                'video_url' => 'https://youtube.com/watch?v=example',
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('galeris', [
            'judul' => 'Judul Video Baru',
            'deskripsi' => 'Deskripsi video.',
            'tipe' => 'video',
            'file_media' => json_encode(['https://youtube.com/watch?v=example']),
        ]);
    }

    public function test_can_render_galeri_edit_page(): void
    {
        $galeri = Galeri::factory()->create();
        $this->get(GaleriResource::getUrl('edit', ['record' => $galeri]))->assertSuccessful();
    }

    public function test_can_update_galeri_foto(): void
    {
        $galeri = Galeri::factory()->create(['tipe' => 'foto']);
        $oldFile = $galeri->file_media[0];
        $newFile = UploadedFile::fake()->image('new.jpg');

        Livewire::test(GaleriResource\Pages\EditGaleri::class, [
            'record' => $galeri->getRouteKey(),
        ])
        ->fillForm([
            'judul' => 'Judul Diperbarui',
            'deskripsi' => 'Deskripsi diperbarui.',
            'tipe' => 'foto',
            'file_media' => [$newFile],
        ])
        ->call('save')
        ->assertHasNoFormErrors();

        $this->assertDatabaseHas('galeris', [
            'id' => $galeri->id,
            'judul' => 'Judul Diperbarui',
            'deskripsi' => 'Deskripsi diperbarui.',
        ]);

        $galeri->refresh();
        Storage::disk('public')->assertMissing($oldFile);
        Storage::disk('public')->assertExists($galeri->file_media[0]);
    }

    public function test_can_update_galeri_video(): void
    {
        $galeri = Galeri::factory()->create(['tipe' => 'video']);

        Livewire::test(GaleriResource\Pages\EditGaleri::class, [
            'record' => $galeri->getRouteKey(),
        ])
        ->fillForm([
            'judul' => 'Judul Video Diperbarui',
            'deskripsi' => 'Deskripsi video diperbarui.',
            'tipe' => 'video',
            'video_url' => 'https://youtube.com/watch?v=newexample',
        ])
        ->call('save')
        ->assertHasNoFormErrors();

        $this->assertDatabaseHas('galeris', [
            'id' => $galeri->id,
            'judul' => 'Judul Video Diperbarui',
            'deskripsi' => 'Deskripsi video diperbarui.',
            'file_media' => json_encode(['https://youtube.com/watch?v=newexample']),
        ]);
    }

    public function test_can_delete_galeri_with_file(): void
    {
        $galeri = Galeri::factory()->create(['tipe' => 'foto']);
        $file = $galeri->file_media[0];

        Livewire::test(GaleriResource\Pages\EditGaleri::class, [
            'record' => $galeri->getRouteKey(),
        ])
        ->callAction(\Filament\Actions\DeleteAction::class);

        $this->assertModelMissing($galeri);
        Storage::disk('public')->assertMissing($file);
    }
}