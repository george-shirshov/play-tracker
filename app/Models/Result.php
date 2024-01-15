<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int|null $member_id
 * @property int $milliseconds
 */
class Result extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function setMemberId(?int $value): void
    {
        $this->member_id = $value;
    }

    public function setMilliseconds(int $value): void
    {
        $this->milliseconds = $value;
    }
}
