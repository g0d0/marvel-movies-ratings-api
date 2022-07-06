<?php

namespace Domain\ObjectValues;

class FavoriteMovie
{
    public function __construct(private int $userId, private int $movieId)
    {
    }

    public function toArray() : array
    {
        return [
            'user_id' => $this->userId,
            'movie_id' => $this->movieId,
        ];
    }
}