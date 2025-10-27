<?php

namespace Tests\Feature\Filament;

use App\Filament\Resources\BeritaResource;
use App\Models\Berita;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class BeritaResourceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAs(User::factory()->create(['email' => 'admin@pesantren.com']));
    }

    public function test_can_render_berita_list_page(): void
    {
        $this->get(BeritaResource::getUrl('index'))->assertSuccessful();
    }

    public function test_can_list_berita(): void
    {
        $beritas = Berita::factory()->count(5)->create();

        Livewire::test(BeritaResource\Pages\ListBeritas::class)
            ->assertCanSeeTableRecords($beritas);
    }

    public function test_can_render_berita_create_page(): void
    {
        $this->get(BeritaResource::getUrl('create'))->assertSuccessful();
    }

    public function test_can_create_berita(): void
    {
        $newData = Berita::factory()->make();

        Livewire::test(BeritaResource\Pages\CreateBerita::class)
            ->fillForm([
                'judul' => $newData->judul,
                'isi_konten' => $newData->isi_konten,
                'status' => $newData->status,
                'kategori_berita' => 'Berita Sekolah',
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('beritas', [
            'judul' => $newData->judul,
            'slug' => \Str::slug($newData->judul),
        ]);
    }

    public function test_can_render_berita_edit_page(): void
    {
        $berita = Berita::factory()->create();
        $this->get(BeritaResource::getUrl('edit', ['record' => $berita]))->assertSuccessful();
    }

    public function test_can_update_berita(): void
    {
        $berita = Berita::factory()->create();
        $newData = Berita::factory()->make();

        Livewire::test(BeritaResource\Pages\EditBerita::class, [
            'record' => $berita->getRouteKey(),
        ])
        ->fillForm([
            'judul' => $newData->judul,
            'isi_konten' => $newData->isi_konten,
            'status' => $newData->status,
            'kategori_berita' => 'Berita Sekolah',
        ])
        ->call('save')
        ->assertHasNoFormErrors();

        $this->assertDatabaseHas('beritas', [
            'id' => $berita->id,
            'judul' => $newData->judul,
        ]);
    }

    public function test_can_delete_berita(): void
    {
        $berita = Berita::factory()->create();

        Livewire::test(BeritaResource\Pages\EditBerita::class, [
            'record' => $berita->getRouteKey(),
        ])
        ->callAction(\Filament\Actions\DeleteAction::class);

        $this->assertModelMissing($berita);
    }
}