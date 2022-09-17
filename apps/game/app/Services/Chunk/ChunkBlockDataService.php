<?php

namespace App\Services\Chunk;

use App\Enums\ChunkBlockDataKeyEnum;
use App\Models\ChunkBlock;
use App\Models\ChunkBlockData;
use Jenssegers\Mongodb\Eloquent\Model;

class ChunkBlockDataService
{

    private Model|ChunkBlockData $chunkBlockData;

    /**
     * @param  \App\Models\ChunkBlock  $chunkBlock
     * @param  \App\Enums\ChunkBlockDataKeyEnum  $key
     */
    public function __construct(private ChunkBlock $chunkBlock, ChunkBlockDataKeyEnum $key)
    {
        $this->chunkBlockData = $this->chunkBlock->data()->firstOrNew([
            'key' => $key->value
        ]);
    }

    /**
     * @return \App\Models\ChunkBlockData
     */
    public function getGroupData(): ChunkBlockData
    {
        return $this->chunkBlockData;
    }

    /**
     * @param  mixed  $value
     *
     * @return $this
     */
    public function setValue(
        mixed $value
    ): self {
        $this->chunkBlockData->value = $value;
        $this->chunkBlockData->save();
        return $this;
    }

}