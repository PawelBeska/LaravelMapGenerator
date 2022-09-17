<?php

namespace App\Generators\ChunkBlockTypes;

use App\Enums\ChunkBlockTypeEnum;
use App\Traits\ChunkBlock\Walkable;

class Grass extends ChunkBlock
{
    use Walkable;

    public function getChunkBlockType(): ChunkBlockTypeEnum
    {
        return ChunkBlockTypeEnum::GRASS;
    }

}