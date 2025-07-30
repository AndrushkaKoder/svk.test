<?php

declare(strict_types=1);

namespace App\Http\Controllers\Gateway\Interfaces;

use App\Http\Requests\ReserveRequest;
use App\Services\Interfaces\GatewayInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use OpenApi\Attributes as OA;

interface EventControllerInterface
{
    #[OA\Get(
        path: '/api/events/{event_id}',
        description: 'Список мест для мероприятия',
        tags: ['Event']
    )]
    #[OA\Parameter(
        name: 'eventID',
        description: 'event ID',
        in: 'path',
        required: true,
        schema: new OA\Schema(type: 'number'),
        example: 1
    )]
    #[OA\Response(response: 200, description: 'OK',
        content: new OA\JsonContent(properties: [
            new OA\Property(
                property: 'success',
                type: 'boolean',
                default: true
            ),
            new OA\Property(
                property: 'event_places',
                type: 'array',
                items: new OA\Items(
                    properties: [
                        new OA\Property(property: 'id', type: 'integer', example: 1),
                        new OA\Property(property: 'x', type: 'integer', example: 1),
                        new OA\Property(property: 'y', type: 'integer', example: 1),
                        new OA\Property(property: 'width', type: 'integer', example: 1),
                        new OA\Property(property: 'height', type: 'integer', example: 1),
                        new OA\Property(property: 'is_available', type: 'boolean', example: true),
                    ],
                    type: 'object'
                )
            )
        ]))]
    public function show(GatewayInterface $gateway, int $id): JsonResponse;

    #[OA\Post(
        path: '/api/{event_id}/reserve',
        tags: ['Event']
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            properties: [
                new OA\Property(
                    property: 'name',
                    description: 'Customer name',
                    type: 'string',
                    example: 'Name'
                ),
                new OA\Property(
                    property: 'places',
                    description: 'array of places numbers',
                    type: 'array',
                    items: new OA\Items(
                        type: 'integer',
                        example: 1
                    ),
                    example: [1, 2, 3]
                ),
            ],
            type: 'object'
        )
    )]
    #[OA\Response(
        response: 200,
        description: 'OK',
        content: new OA\JsonContent(properties: [
            new OA\Property(
                property: 'success',
                type: 'boolean',
                default: true
            ),
            new OA\Property(
                property: 'reserve_number',
                type: 'string',
                example: '688a8e0c35b44'
            )
        ])
    )]
    public function reserve(GatewayInterface $gateway, ReserveRequest $request, int $id): JsonResponse;
}
