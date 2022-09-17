<?php

namespace App\Traits\ChunkBlock;

trait HasData
{
    /**
     * @var array
     */
    private array $data = [];

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param  array  $data
     *
     * @return void
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @param  string  $key
     * @param  mixed  $value
     *
     * @return void
     */
    public function setDataKey(string $key, mixed $value): void
    {
        $this->data[$key] = $value;
    }
}