<?php

declare(strict_types=1);

namespace App\DTO;

final readonly class Show
{
    public function __construct(
        private int $showId
    )
    {
    }

    public function getShowId(): int
    {
        return $this->showId;
    }
}
