<?php

namespace App\Generators\ChunkTypes;

use App\Enums\ChunkBlockTypeEnum;
use App\Enums\ChunkTypeEnum;
use App\Generators\ChunkBlockTypes\Dirt;
use App\Generators\ChunkBlockTypes\Grass;
use App\Generators\ChunkBlockTypes\Tree;
use Illuminate\Support\Collection;

class Forest extends Chunk
{
    public function getChunkType(): ChunkTypeEnum
    {
        return ChunkTypeEnum::FOREST;
    }

    public function getChunkBlockTypes(): Collection
    {
        return collect([
            (new Dirt())->isWalkable(true),
            (new Tree())->isWalkable(false),
            (new Grass())->isWalkable(true),
        ]);
    }

    public function getPattern(): Collection
    {
        return collect([
            [
                'min' => 0,
                'max' => 0.2,
                'type' => $this->getChunkBlockInstance(ChunkBlockTypeEnum::DIRT->getGeneratorClass()),
            ],
            [
                'min' => 0.2,
                'max' => 0.4,
                'type' =>  $this->getChunkBlockInstance(ChunkBlockTypeEnum::TREE->getGeneratorClass())
            ],
            [
                'min' => 0.4,
                'max' => 1,
                'type' =>  $this->getChunkBlockInstance(ChunkBlockTypeEnum::GRASS->getGeneratorClass())
            ],
        ]);
    }
}