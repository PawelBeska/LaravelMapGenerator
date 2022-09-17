<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\BelongsTo;

class ChunkBlockData extends Model
{
    use HasFactory;

    public function chunkBlock(): BelongsTo
    {
        return $this->belongsTo(ChunkBlock::class);
    }
}
