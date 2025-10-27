<?php

namespace Tests\Feature\Filament;

use App\Filament\Resources\ProgramDanFasilitasResource;
use App\Models\ProgramDanFasilitas;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ProgramDanFasilitasResourceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAs(User::factory()->create(['email' => 'admin@pesantren.com']));
    }

    public function test_can_render_program_dan_fasilitas_list_page(): void
    {
        $this->get(ProgramDanFasilitasResource::getUrl('index'))->assertSuccessful();
    }

    public function test_can_list_program_dan_fasilitas(): void
    {
        $records = ProgramDanFasilitas::factory()->count(1)->create();

        Livewire::test(ProgramDanFasilitasResource\Pages\ListProgramDanFasilitas::class)
            ->assertCanSeeTableRecords($records);
    }

    public function test_can_render_program_dan_fasilitas_create_page(): void
    {
        $this->get(ProgramDanFasilitasResource::getUrl('create'))->assertSuccessful();
    }

    public function test_can_create_program_dan_fasilitas(): void
    {
        $newData = ProgramDanFasilitas::factory()->make();

        Livewire::test(ProgramDanFasilitasResource\Pages\CreateProgramDanFasilitas::class)
            ->fillForm([
                'program_pendidikan' => $newData->program_pendidikan,
                'fasilitas' => $newData->fasilitas,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('program_dan_fasilitas', [
            'program_pendidikan' => $newData->program_pendidikan,
        ]);
    }

    public function test_can_render_program_dan_fasilitas_edit_page(): void
    {
        $record = ProgramDanFasilitas::factory()->create();
        $this->get(ProgramDanFasilitasResource::getUrl('edit', ['record' => $record]))->assertSuccessful();
    }

    public function test_can_update_program_dan_fasilitas(): void
    {
        $record = ProgramDanFasilitas::factory()->create();
        $newData = ProgramDanFasilitas::factory()->make();

        Livewire::test(ProgramDanFasilitasResource\Pages\EditProgramDanFasilitas::class, [
            'record' => $record->getRouteKey(),
        ])
        ->fillForm([
            'program_pendidikan' => $newData->program_pendidikan,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

        $this->assertDatabaseHas('program_dan_fasilitas', [
            'id' => $record->id,
            'program_pendidikan' => $newData->program_pendidikan,
        ]);
    }

    public function test_can_delete_program_dan_fasilitas(): void
    {
        $record = ProgramDanFasilitas::factory()->create();

        Livewire::test(ProgramDanFasilitasResource\Pages\EditProgramDanFasilitas::class, [
            'record' => $record->getRouteKey(),
        ])
        ->callAction(\Filament\Actions\DeleteAction::class);

        $this->assertModelMissing($record);
    }
}