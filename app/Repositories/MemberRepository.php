<?php

namespace App\Repositories;

use App\Models\Member;

class MemberRepository
{
    public function getByEmail(string $email): Member
    {
        /** @var Member */
        return Member::query()->where('email', $email)->firstOrCreate();
    }
}
