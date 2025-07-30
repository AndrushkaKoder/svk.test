<?php

namespace App\Providers;

use App\Services\Http\Client;
use App\Services\Interfaces\ClientInterface;
use App\Services\Interfaces\GatewayInterface;
use App\Services\ShowGateway\LeadBookGateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(GatewayInterface::class, LeadBookGateway::class);
        $this->app->bind(ClientInterface::class, Client::class);
    }

    public function boot(): void
    {
    }
}
