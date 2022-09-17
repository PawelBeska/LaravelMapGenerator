<?php

namespace App\Generators\ChunkBlockTypes;

use App\Enums\ChunkBlockTypeEnum;

class Dirt extends ChunkBlock
{
    public function getChunkBlockType(): ChunkBlockTypeEnum
    {
        return ChunkBlockTypeEnum::DIRT;
    }

}