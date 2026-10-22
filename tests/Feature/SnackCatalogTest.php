<?php

namespace Tests\Feature;

use App\Models\Snack;
use Database\Seeders\SnackSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SnackCatalogTest extends TestCase
{
    use RefreshDatabase;

    public function test_catalog_page_displays_seeded_snacks(): void
    {
        $this->seed(SnackSeeder::class);

        $this->get(route('snacks.index'))
            ->assertOk()
            ->assertSee('Keripik Singkong')
            ->assertSee(asset('bootstrap-5.3.8-dist/css/bootstrap.min.css'))
            ->assertSee(asset('bootstrap-5.3.8-dist/css/style.css'))
            ->assertSee(asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js'))
            ->assertSee(route('snacks.show', Snack::firstOrFail()));
    }

    public function test_snack_detail_page_displays_the_selected_snack(): void
    {
        $this->seed(SnackSeeder::class);
        $snack = Snack::where('name', 'Basreng')->firstOrFail();

        $this->get(route('snacks.show', $snack))
            ->assertOk()
            ->assertSee('Basreng')
            ->assertSee($snack->flavor)
            ->assertSee($snack->description);
    }
}
