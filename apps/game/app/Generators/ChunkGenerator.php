<?php

namespace App\Generators;

use App\Enums\ChunkTypeEnum;
use App\Generators\ChunkTypes\Chunk;
use App\Models\World;

class ChunkGenerator
{
    private Chunk $chunk;

    private World $world;

    private int $size = 100;

    private int $x;

    private int $y;

    private float $persistence = 0.05;

    private int $seed = 100000;

    public function __construct()
    {
    }

    /**
     * @param  \App\Models\World  $world
     *
     * @return $this
     */
    public function setWorld(World $world): self
    {
        $this->world = $world;
        return $this;
    }

    /**
     * @return \App\Models\World
     */
    public function getWorld(): World
    {
        return $this->world;
    }

    /**
     * @param  \App\Enums\ChunkTypeEnum  $chunkType
     *
     * @return $this
     */
    public function setChunkType(ChunkTypeEnum $chunkType): self
    {
        $this->chunk = app($chunkType->getGeneratorClass());
        return $this;
    }


    /**
     * @return \App\Generators\ChunkTypes\Chunk
     */
    public function getChunkType(): Chunk
    {
        return $this->chunk;
    }

    /**
     * @param  int  $size
     *
     * @return $this
     */
    public function setSize(int $size): self
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @param  float|int  $persistence
     *
     * @return $this
     */
    public function setPersistence(float|int $persistence): self
    {
        $this->persistence = $persistence;
        return $this;
    }

    /**
     * @param  int  $seed
     *
     * @return $this
     */
    public function setSeed(int $seed): self
    {
        $this->seed = $seed;
        return $this;
    }

    /**
     * @param  int  $x
     * @param  int  $y
     *
     * @return $this
     */
    public function setPosition(int $x, int $y): self
    {
        $this->x = $x;
        $this->y = $y;
        return $this;
    }

    /**
     * @return $this
     */
    public function generate(): self
    {
        $this->chunk
            ->setWorld($this->world)
            ->setPosition($this->x, $this->y)
            ->setSize($this->size)
            ->setPersistence($this->persistence)
            ->setSeed($this->seed)
            ->generate();

        return $this;
    }
}