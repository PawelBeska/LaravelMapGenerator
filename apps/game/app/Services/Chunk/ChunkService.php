<?php

namespace App\Services\Chunk;

use App\Enums\ChunkTypeEnum;
use App\Models\Chunk;
use App\Models\World;

class ChunkService
{
    /**
     * @param  Chunk  $chunk
     */
    public function __construct(
        private readonly Chunk $chunk = new Chunk()
    ) {
    }

    public function getChunk(): Chunk
    {
        return $this->chunk;
    }

    /**
     * @param  World  $world
     * @param  ChunkTypeEnum  $chunkTypeEnum
     * @param  int  $x
     * @param  int  $y
     * @param  int  $size
     *
     * @return ChunkService
     */
    public function assignData(
        World $world,
        ChunkTypeEnum $chunkTypeEnum,
        int $x,
        int $y,
        int $size,
    ): static {
        $this->chunk->world()->associate($world);
        $this->chunk->type = $chunkTypeEnum;
        $this->chunk->x = $x;
        $this->chunk->y = $y;
        $this->chunk->size = $size;
        $this->chunk->save();
        return $this;
    }
}