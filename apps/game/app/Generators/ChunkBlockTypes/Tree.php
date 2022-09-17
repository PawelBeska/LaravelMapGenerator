<?php

namespace App\Generators\ChunkBlockTypes;

use App\Enums\ChunkBlockTypeEnum;

class Tree extends ChunkBlock
{
    public function getChunkBlockType(): ChunkBlockTypeEnum
    {
        return ChunkBlockTypeEnum::TREE;
    }


}