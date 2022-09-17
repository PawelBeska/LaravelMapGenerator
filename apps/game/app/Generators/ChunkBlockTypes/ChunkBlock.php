<?php

namespace App\Generators\ChunkBlockTypes;

use App\Enums\ChunkBlockTypeEnum;
use App\Interfaces\ChunkBlockHasDataInterface;
use App\Traits\ChunkBlock\HasData;

abstract class ChunkBlock implements ChunkBlockHasDataInterface
{
    use HasData;

    abstract public function getChunkBlockType(): ChunkBlockTypeEnum;

    /**
     * @param  bool  $value
     *
     * @return $this
     */
    public function isWalkable(bool $value): self
    {
        $this->setDataKey('walkable', $value);
        return $this;
    }


}