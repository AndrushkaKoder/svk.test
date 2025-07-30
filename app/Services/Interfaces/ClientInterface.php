<?php

declare(strict_types=1);

namespace App\Services\Interfaces;

use Illuminate\Http\Client\Response;

interface ClientInterface
{
    public function get(string $uri): ?Response;

    public function post(string $uri, array $body): ?Response;
}
