<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Result;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        Member::factory(250)
            ->has(Result::factory(25))
            ->create();
    }
}
