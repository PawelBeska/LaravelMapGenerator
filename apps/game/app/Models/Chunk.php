<?php

namespace App\Models;

use App\Enums\ChunkTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\BelongsTo;
use Jenssegers\Mongodb\Relations\HasMany;

/**
 * @property int $size
 * @property int $y
 * @property int $x
 * @property ChunkTypeEnum $type
 */
class Chunk extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $casts = [
        'type' => ChunkTypeEnum::class
    ];

    /**
     * @return BelongsTo
     */
    public function world(): BelongsTo
    {
        return $this->belongsTo(World::class);
    }

    /**
     * @return HasMany
     */
    public function blocks(): HasMany
    {
        return $this->hasMany(ChunkBlock::class);
    }

}
