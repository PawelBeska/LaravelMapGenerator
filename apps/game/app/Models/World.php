<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\HasMany;

class World extends Model
{
    use HasFactory;

    public function chunks(): HasMany
    {
        return $this->hasMany(Chunk::class);
    }
}
