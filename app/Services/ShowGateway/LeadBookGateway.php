<?php

declare(strict_types=1);

namespace App\Services\ShowGateway;

use App\DTO\Event;
use App\DTO\Show;

class LeadBookGateway extends AbstractGateway
{
    public function getShows(): ?array
    {
        return $this->getData('/shows');
    }

    public function getShowEvents(Show $show): ?array
    {
        return $this->getData('/shows/' . $show->getShowId() . '/events');
    }

    public function getEventPlaces(Event $event): ?array
    {
        return $this->getData('/events/' . $event->getEventId() . '/places');
    }

    public function reserveEventPlaces(Event $event): ?array
    {
        $uri = '/events/' . $event->getEventId() . '/reserve';
        $body = [
            'name' => $event->getCustomerName(),
            'places' => $event->getPlacesList()
        ];

        return $this->sendData($uri, $body);
    }
}
