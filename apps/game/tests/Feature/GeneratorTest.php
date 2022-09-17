<?php

namespace Tests\Feature;

use App\Enums\ChunkTypeEnum;
use App\Generators\ChunkGenerator;
use App\Models\Chunk;
use App\Models\World;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use MapGenerator\PerlinNoiseGenerator;
use Tests\TestCase;

class GeneratorTest extends TestCase
{

    private ChunkGenerator $chunkGenerator;

    public function setUp(): void
    {
        parent::setUp();
        $this->chunkGenerator = new ChunkGenerator();
    }

    /**
     * @throws \Exception
     */
    public function testGenerateChunk(): void
    {
        $this->chunkGenerator
            ->setWorld(World::factory()->create())
            ->setChunkType(ChunkTypeEnum::FOREST)
            ->setPosition(0, 0)
            ->setSeed(random_int(10, 100000))
            ->setSize(100)
            ->generate();
    }

    public function testMapGenerator(): void
    {
        $size = 100;

        $this->chunkGenerator
            ->setWorld(World::factory()->create())
            ->setChunkType(ChunkTypeEnum::FOREST)
            ->setPosition(0, 0)
            ->setSeed(random_int(10, 100000))
            ->setSize($size)
            ->generate();

        $img = Image::make('public/test.png')->resize(
            $size * 10,
            $size * 10
        );
        $x = 0;
        $y = 0;
        Chunk::query()->latest()->first()->blocks->each(function ($block) use ($img, &$x, &$y, $size) {
            if ($x === $size) {
                $x = 0;
                $y++;
            }
            $img->insert($block->type->getImage(), 'top-left', $block->x + ($x * 9), $block->y + ($y * 9));
            $x++;
        });
        $img->save('public/test'.Str::random().'.png');
    }

    public function testGenerator(): void
    {
        $generator = new PerlinNoiseGenerator();
        $generator->setSize(2);
        $generator->setPersistence(10); //map roughness
        $generator->setMapSeed(1);
        $map = collect($generator->generate());
    }
}
