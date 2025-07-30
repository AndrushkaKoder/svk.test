<?php

declare(strict_types=1);

namespace App\Services\Interfaces;

use App\DTO\Event;
use App\DTO\Show;

interface GatewayInterface
{
    public function getShows(): ?array;

    public function getShowEvents(Show $show): ?array;

    public function getEventPlaces(Event $event): ?array;

    public function reserveEventPlaces(Event $event): ?array;
}
