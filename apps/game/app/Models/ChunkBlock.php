<?php

namespace App\Models;

use App\Enums\ChunkBlockTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\BelongsTo;
use Jenssegers\Mongodb\Relations\HasMany;
use Jenssegers\Mongodb\Relations\HasOne;

/**
 * @property ChunkBlockTypeEnum $type
 * @property int $y
 * @property int $x
 */
class ChunkBlock extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $casts = [
        'type' => ChunkBlockTypeEnum::class
    ];

    /**
     * @return HasMany
     */
    public function data(): HasMany
    {
        return $this->hasMany(ChunkBlockData::class);
    }

    /**
     * @return BelongsTo
     */
    public function chunk(): BelongsTo
    {
        return $this->belongsTo(Chunk::class);
    }
}
