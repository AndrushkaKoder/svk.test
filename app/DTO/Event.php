<?php

declare(strict_types=1);

namespace App\DTO;

final readonly class Event
{
    public function __construct(
        private int $eventId,
        private ?string $customerName = null,
        private ?array $placesList = null
    ) {
    }

    public function getCustomerName(): ?string
    {
        return $this->customerName;
    }

    public function getPlacesList(): ?array
    {
        return $this->placesList;
    }

    public function getEventId(): int
    {
        return $this->eventId;
    }
}
