<?php

namespace App\Services\Chunk;

use App\Models\Chunk;
use App\Models\ChunkBlock;

class ChunkBlockService
{

    /**
     * @param  \App\Models\ChunkBlock  $chunkBlock
     */
    public function __construct(
        private readonly ChunkBlock $chunkBlock = new ChunkBlock()
    ) {
    }

    public function getChunkBlock(): ChunkBlock
    {
        return $this->chunkBlock;
    }

    public function assignData(
        Chunk $chunk,
        \App\Generators\ChunkBlockTypes\ChunkBlock $chunkBlockType,
        int $x,
        int $y,
    ): self {
        $this->chunkBlock->chunk()->associate($chunk);
        $this->chunkBlock->type = $chunkBlockType->getChunkBlockType();
        $this->chunkBlock->x = $x;
        $this->chunkBlock->y = $y;
        $this->chunkBlock->save();

        return $this;
    }
}