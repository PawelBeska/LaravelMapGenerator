<?php

namespace App\Enums;

use App\Generators\ChunkTypes\Forest;
use App\Generators\ChunkTypes\Mountain;

enum ChunkTypeEnum: string
{

    case FOREST = 'forest';
    case MOUNTAIN = 'mountain';

    public static function getTypes(): array
    {
        return [

        ];
    }

    public function getGeneratorClass(): string
    {
        return match ($this) {
            self::MOUNTAIN => Mountain::class,
            self::FOREST => Forest::class
        };
    }
}
