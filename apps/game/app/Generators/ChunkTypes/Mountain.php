<?php

namespace App\Generators\ChunkTypes;

use App\Enums\ChunkTypeEnum;

class Mountain extends Chunk
{
    public function getChunkType(): ChunkTypeEnum
    {
        return ChunkTypeEnum::MOUNTAIN;
    }

    public function getChunkBlockTypes(): array
    {
        return [
            'grass' => [
                'walkable' => true,
            ],
            'tree' => [
                'walkable' => false,
            ],
        ];
    }

    public function generate(): void
    {
        // TODO: Implement generate() method.
    }
}