<?php

namespace App\Enums;

use App\Generators\ChunkBlockTypes\Dirt;
use App\Generators\ChunkBlockTypes\Grass;
use App\Generators\ChunkBlockTypes\Tree;

enum ChunkBlockTypeEnum: string
{

    case GRASS = 'grass';
    case DIRT = 'dirt';
    case TREE = 'tree';

    public static function getTypes(): array
    {
        return [

        ];
    }

    public function getImage(): string
    {
        return match ($this) {
            self::GRASS =>'public/grass.png',
            self::DIRT => 'public/dirt.png',
            self::TREE => 'public/tree.png',
        };
    }

    public function getGeneratorClass(): string
    {
        return match ($this) {
            self::GRASS => Grass::class,
            self::DIRT => Dirt::class,
            self::TREE => Tree::class
        };
    }
}
