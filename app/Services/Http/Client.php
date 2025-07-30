<?php

declare(strict_types=1);

namespace App\Services\Http;

use App\Helpers\UriHandler;
use App\Services\Interfaces\ClientInterface;
use Illuminate\Support\Facades\Http;
use \Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;

class Client implements ClientInterface
{
    protected string $gatewayUrl;
    protected string $token;

    public function __construct()
    {
        $this->gatewayUrl = config('gateway.url');
        $this->token = config('gateway.bearer');
    }

    public function get(string $uri): ?Response
    {
        $uri = UriHandler::normalize($uri);

        try {
            return Http::withHeaders([
                'Authorization' => "Bearer {$this->token}",
                'Content-Type' => 'application/json',
            ])->get("{$this->gatewayUrl}/{$uri}");
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return null;
        }
    }

    public function post(string $uri, array $body): ?Response
    {
        $uri = UriHandler::normalize($uri);

        try {
            return Http::withHeaders([
                'Authorization' => "Bearer {$this->token}",
                'Content-Type' => 'application/json',
            ])
                ->asForm()
                ->post("{$this->gatewayUrl}/{$uri}", $body);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return null;
        }
    }
}
