<?php

namespace App\Enums;

enum ChunkBlockDataKeyEnum: string
{

    case WALKABLE = 'walkable';

    public static function getTypes(): array
    {
        return [

        ];
    }
}
