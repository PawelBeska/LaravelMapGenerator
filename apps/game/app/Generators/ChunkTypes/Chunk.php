<?php

namespace App\Generators\ChunkTypes;

use App\Enums\ChunkBlockTypeEnum;
use App\Enums\ChunkTypeEnum;
use App\Generators\ChunkBlockTypes\ChunkBlock;
use App\Models\World;
use App\Services\Chunk\ChunkBlockService;
use App\Services\Chunk\ChunkService;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use MapGenerator\PerlinNoiseGenerator;

abstract class Chunk
{

    private World $world;

    private int $size;

    private int $x;

    private int $y;

    private float|int $persistence;

    private int $seed;

    public function __construct(private readonly ChunkService $chunkService)
    {
    }

    public function setWorld(World $world): self
    {
        $this->world = $world;
        return $this;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;
        return $this;
    }

    public function setPersistence(float|int $persistence): self
    {
        $this->persistence = $persistence;
        return $this;
    }

    public function setSeed(int $seed): self
    {
        $this->seed = $seed;
        return $this;
    }

    public function setPosition(int $x, int $y): self
    {
        $this->x = $x;
        $this->y = $y;
        return $this;
    }

    abstract public function getChunkType(): ChunkTypeEnum;

    abstract public function getChunkBlockTypes(): Collection;

    private function getNoise(): Collection
    {
        $generator = new PerlinNoiseGenerator();
        $generator->setSize($this->size);
        $generator->setPersistence($this->persistence);
        $generator->setMapSeed($this->seed);
        return collect($generator->generate());
    }

    abstract public function getPattern(): Collection;

    protected function getChunkBlockInstance($generatorClass): ChunkBlock
    {
        return $this->getChunkBlockTypes()->filter(function (ChunkBlock $chunkBlock) use ($generatorClass) {
            return $chunkBlock instanceof $generatorClass;
        })->first();
    }

    private function getChunkBlockType(float $noise): ChunkBlock
    {
        return $this->getPattern()->where('min', '<=', $noise)->where('max', '>=', $noise)->first()['type'];
    }

    public function generate(): void
    {
        $map = $this->getNoise();

        $chunk = $this->chunkService->assignData(
            $this->world,
            $this->getChunkType(),
            $this->x,
            $this->y,
            $this->size,
        )->getChunk();

        $map->each(function ($row, $y) use ($chunk) {
            collect($row)->each(function ($value, $x) use ($chunk, $y) {
                (new ChunkBlockService())->assignData(
                    $chunk,
                    $this->getChunkBlockType($value),
                    $x,
                    $y,
                );
            });
        });
    }
}