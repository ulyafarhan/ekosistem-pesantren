<?php

namespace Tests\Feature\Filament;

use App\Filament\Resources\SejarahUnitPendidikanResource;
use App\Models\SejarahUnitPendidikan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class SejarahUnitPendidikanResourceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAs(User::factory()->create(['email' => 'admin@pesantren.com']));
    }

    public function test_can_render_sejarah_unit_pendidikan_list_page(): void
    {
        $this->get(SejarahUnitPendidikanResource::getUrl('index'))->assertSuccessful();
    }

    public function test_can_list_sejarah_unit_pendidikan(): void
    {
        $records = SejarahUnitPendidikan::factory()->count(1)->create();

        Livewire::test(SejarahUnitPendidikanResource\Pages\ListSejarahUnitPendidikans::class)
            ->assertCanSeeTableRecords($records);
    }

    public function test_can_render_sejarah_unit_pendidikan_create_page(): void
    {
        $this->get(SejarahUnitPendidikanResource::getUrl('create'))->assertSuccessful();
    }

    public function test_can_create_sejarah_unit_pendidikan(): void
    {
        $newData = SejarahUnitPendidikan::factory()->make();

        Livewire::test(SejarahUnitPendidikanResource\Pages\CreateSejarahUnitPendidikan::class)
            ->fillForm([
                'sejarah_smp' => $newData->sejarah_smp,
                'sejarah_sma' => $newData->sejarah_sma,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('sejarah_unit_pendidikans', [
            'sejarah_smp' => $newData->sejarah_smp,
        ]);
    }

    public function test_can_render_sejarah_unit_pendidikan_edit_page(): void
    {
        $record = SejarahUnitPendidikan::factory()->create();
        $this->get(SejarahUnitPendidikanResource::getUrl('edit', ['record' => $record]))->assertSuccessful();
    }

    public function test_can_update_sejarah_unit_pendidikan(): void
    {
        $record = SejarahUnitPendidikan::factory()->create();
        $newData = SejarahUnitPendidikan::factory()->make();

        Livewire::test(SejarahUnitPendidikanResource\Pages\EditSejarahUnitPendidikan::class, [
            'record' => $record->getRouteKey(),
        ])
        ->fillForm([
            'sejarah_smp' => $newData->sejarah_smp,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

        $this->assertDatabaseHas('sejarah_unit_pendidikans', [
            'id' => $record->id,
            'sejarah_smp' => $newData->sejarah_smp,
        ]);
    }

    public function test_can_delete_sejarah_unit_pendidikan(): void
    {
        $record = SejarahUnitPendidikan::factory()->create();

        Livewire::test(SejarahUnitPendidikanResource\Pages\EditSejarahUnitPendidikan::class, [
            'record' => $record->getRouteKey(),
        ])
        ->callAction(\Filament\Actions\DeleteAction::class);

        $this->assertModelMissing($record);
    }
}