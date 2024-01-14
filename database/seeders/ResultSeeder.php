<?php

namespace Database\Seeders;

use App\Models\Result;
use Illuminate\Database\Seeder;

class ResultSeeder extends Seeder
{
    public function run(): void
    {
        Result::factory(10)->create();
    }
}
