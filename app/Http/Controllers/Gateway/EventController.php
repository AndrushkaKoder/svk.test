<?php

declare(strict_types=1);

namespace App\Http\Controllers\Gateway;

use App\DTO\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReserveRequest;
use App\Services\Interfaces\GatewayInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class EventController extends Controller
{
    public function show(GatewayInterface $gateway, int $id): JsonResponse
    {
        if ($placesList = $gateway->getEventPlaces(new Event($id))) {
            return response()->json([
                'success' => true,
                'event_places'  => $placesList
            ]);
        }

        return response()->json([
            'success' => false,
            'error'   => __('errors.places')
        ]);
    }

    public function reserve(GatewayInterface $gateway, ReserveRequest $request, int $id): JsonResponse
    {
        if ($reserved = $gateway->reserveEventPlaces(new Event($id, $request->name, $request->places))) {
            return response()->json([
                'success'        => true,
                'reserve_number' => data_get($reserved, 'reservation_id')
            ]);
        }

        return response()->json([
            'success' => false,
            'error'   => __('errors.reserve')
        ]);
    }
}
