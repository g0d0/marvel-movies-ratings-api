<?php

namespace Domain\ObjectValues;

class Movie
{
    public function __construct(private string $name)
    {
    }

    public function toArray() : array
    {
        return [
            'name' => $this->name,
        ];
    }
}