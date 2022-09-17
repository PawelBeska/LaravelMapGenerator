<?php

namespace App\Services\World;

use App\Models\World;

class WorldService{

    /**
     * @param  \App\Models\World  $world
     */
    public function __construct(private readonly World $world = new World())
    {

    }

    /**
     * @return \App\Models\World
     */
    public function getWorld():World
    {
        return $this->world;
    }

    /**
     * @return $this
     */
    public function assignData(): static
    {

        return $this;
    }
}