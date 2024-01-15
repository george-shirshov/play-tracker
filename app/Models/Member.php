<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 */
class Member extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['email'];

    public function getId(): int
    {
        return $this->id;
    }

    public function results(): HasMany
    {
        return $this->hasMany(Result::class);
    }
}
