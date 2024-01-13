<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    public function setMemberId(?int $value): void
    {
        $this->member_id = $value;
    }

    public function setMilliseconds(int $value): void
    {
        $this->milliseconds = $value;
    }
}
