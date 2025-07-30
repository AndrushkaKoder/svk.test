<?php

declare(strict_types=1);

namespace App\Http\Controllers\Gateway;

use App\DTO\Show;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\GatewayInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ShowController extends Controller
{
    public function index(GatewayInterface $gateway): JsonResponse
    {
        if ($showsList = $gateway->getShows()) {
            return response()->json([
                'success' => true,
                'shows'   => $showsList
            ]);
        }

        return response()->json([
            'success' => false,
            'error'   => __('errors.shows')
        ]);
    }

    public function show(GatewayInterface $gateway, int $id): JsonResponse
    {
        if ($show = $gateway->getShowEvents(new Show($id))) {
            return response()->json([
                'success' => true,
                'show_events'    => $show
            ]);
        }

        return response()->json([
            'success' => false,
            'error'   => __('errors.shows')
        ]);
    }
}
