<?php

namespace Tests\Feature\Filament;

use App\Filament\Resources\PeriodePendaftaranResource;
use App\Models\PeriodePendaftaran;
use App\Models\User;
use App\Models\Brosur;
use App\Models\KontakPanitia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PeriodePendaftaranResourceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAs(User::factory()->create(['email' => 'admin@pesantren.com']));
    }

    public function test_can_render_periode_pendaftaran_list_page(): void
    {
        $this->get(PeriodePendaftaranResource::getUrl('index'))->assertSuccessful();
    }

    public function test_can_list_periode_pendaftaran(): void
    {
        $periodes = PeriodePendaftaran::factory()->count(3)->create();

        Livewire::test(PeriodePendaftaranResource\Pages\ListPeriodePendaftarans::class)
            ->assertCanSeeTableRecords($periodes);
    }

    public function test_can_render_periode_pendaftaran_create_page(): void
    {
        $this->get(PeriodePendaftaranResource::getUrl('create'))->assertSuccessful();
    }

    public function test_can_create_periode_pendaftaran_and_brosur(): void
    {
        $newData = PeriodePendaftaran::factory()->make();
        $brosurData = Brosur::factory()->make();

        Livewire::test(PeriodePendaftaranResource\Pages\CreatePeriodePendaftaran::class)
            ->assertStepExists('Detail Periode')
            ->assertStepExists('Konten Brosur')
            ->fillForm([
                'tahun_ajaran' => $newData->tahun_ajaran,
                'gelombang' => $newData->gelombang,
                'tanggal_buka' => $newData->tanggal_buka,
                'tanggal_tutup' => $newData->tanggal_tutup,
                'status' => $newData->status,
                'brosur.sejarah' => $brosurData->sejarah,
                'brosur.visi_misi' => $brosurData->visi_misi,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('periode_pendaftarans', [
            'tahun_ajaran' => $newData->tahun_ajaran,
            'gelombang' => $newData->gelombang,
            'tanggal_buka' => $newData->tanggal_buka,
            'tanggal_tutup' => $newData->tanggal_tutup,
            'status' => $newData->status,
        ]);

        $periode = PeriodePendaftaran::first();
        $this->assertDatabaseHas('brosurs', [
            'periode_pendaftaran_id' => $periode->id,
            'sejarah' => $brosurData->sejarah,
            'visi_misi' => $brosurData->visi_misi,
        ]);
    }

    public function test_can_render_periode_pendaftaran_edit_page(): void
    {
        $periode = PeriodePendaftaran::factory()->has(Brosur::factory())->create();
        $this->get(PeriodePendaftaranResource::getUrl('edit', ['record' => $periode]))->assertSuccessful();
    }

    public function test_can_update_periode_pendaftaran_and_brosur(): void
    {
        $periode = PeriodePendaftaran::factory()->has(Brosur::factory())->create();
        $newData = PeriodePendaftaran::factory()->make();
        $newBrosurData = Brosur::factory()->make();

        Livewire::test(PeriodePendaftaranResource\Pages\EditPeriodePendaftaran::class, [
            'record' => $periode->getRouteKey(),
        ])
        ->fillForm([
            'tahun_ajaran' => $newData->tahun_ajaran,
            'gelombang' => $newData->gelombang,
            'brosur.sejarah' => $newBrosurData->sejarah,
            'brosur.visi_misi' => $newBrosurData->visi_misi,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

        $this->assertDatabaseHas('periode_pendaftarans', [
            'id' => $periode->id,
            'tahun_ajaran' => $newData->tahun_ajaran,
            'gelombang' => $newData->gelombang,
        ]);

        $this->assertDatabaseHas('brosurs', [
            'id' => $periode->brosur->id,
            'sejarah' => $newBrosurData->sejarah,
            'visi_misi' => $newBrosurData->visi_misi,
        ]);
    }

    public function test_can_delete_periode_pendaftaran(): void
    {
        $periode = PeriodePendaftaran::factory()->create();

        Livewire::test(PeriodePendaftaranResource\Pages\EditPeriodePendaftaran::class, [
            'record' => $periode->getRouteKey(),
        ])
        ->callAction(\Filament\Actions\DeleteAction::class);

        $this->assertModelMissing($periode);
    }

    public function test_can_manage_kontak_panitia_relation(): void
    {
        $periode = PeriodePendaftaran::factory()->create();
        $kontak = KontakPanitia::factory()->make();

        Livewire::test(PeriodePendaftaranResource\RelationManagers\KontakPanitiaRelationManager::class,[
            'ownerRecord' => $periode,
            'pageClass' => PeriodePendaftaranResource\Pages\EditPeriodePendaftaran::class,
        ])
        ->callTableAction(\Filament\Actions\CreateAction::class, data: [
            'nama' => $kontak->nama,
            'nomor_telepon' => $kontak->nomor_telepon,
            'jabatan' => $kontak->jabatan,
        ])
        ->assertHasNoTableActionErrors();

        $this->assertDatabaseHas('kontak_panitias', [
            'periode_pendaftaran_id' => $periode->id,
            'nama' => $kontak->nama,
        ]);
    }
}