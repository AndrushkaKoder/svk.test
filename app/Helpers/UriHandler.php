<?php

declare(strict_types=1);

namespace App\Helpers;

class UriHandler
{
    public static function normalize(string $uri): string
    {
        return trim($uri, '/');
    }
}
