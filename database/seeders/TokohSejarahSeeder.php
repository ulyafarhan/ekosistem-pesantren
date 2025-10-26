<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TokohSejarah;

class TokohSejarahSeeder extends Seeder
{
    public function run(): void
    {
        TokohSejarah::factory(10)->create();
    }
}