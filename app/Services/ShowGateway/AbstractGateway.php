<?php

declare(strict_types=1);

namespace App\Services\ShowGateway;

use App\Services\Interfaces\ClientInterface;
use App\Services\Interfaces\GatewayInterface;

abstract class AbstractGateway implements GatewayInterface
{
    public function __construct(private readonly ClientInterface $client)
    {
    }

    protected function getData(string $uri): ?array
    {
        if ($response = $this->client->get($uri)) {
            return data_get(json_decode($response->getBody()->getContents(), true), 'response');
        }

        return null;
    }

    protected function sendData(string $uri, array $body): ?array
    {
        if ($response = $this->client->post($uri, $body)) {
            return data_get(json_decode($response->getBody()->getContents(), true), 'response');
        }

        return null;
    }
}
