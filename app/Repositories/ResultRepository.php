<?php

namespace App\Repositories;

use App\Models\Result;

class ResultRepository
{
    public function save(?int $memberId, int $milliseconds): void
    {
        $result = new Result();
        $result->setMemberId($memberId);
        $result->setMilliseconds($milliseconds);

        $result->save();
    }
}
