<?php

declare(strict_types=1);

namespace App\Http\Controllers\Gateway\Interfaces;

use App\Services\Interfaces\GatewayInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use OpenApi\Attributes as OA;

interface ShowControllerInterface
{
    #[OA\Get(
        path: '/api/shows',
        description: 'Список мероприятий',
        tags: ['Show']
    )]
    #[OA\Response(response: 200, description: 'OK',
        content: new OA\JsonContent(properties: [
            new OA\Property(
                property: 'success',
                type: 'boolean',
                default: true
            ),
            new OA\Property(
                property: 'shows',
                type: 'array',
                items: new OA\Items(
                    properties: [
                        new OA\Property(property: 'id', type: 'integer', example: 1),
                        new OA\Property(property: 'name', type: 'string', example: 'Show #1'),
                    ],
                    type: 'object'
                )
            )
        ]))]
    public function index(GatewayInterface $gateway): JsonResponse;

    #[OA\Get(
        path: '/api/shows/{show_id}',
        description: 'Список событий мероприятия',
        tags: ['Show']
    )]
    #[OA\Parameter(
        name: 'showID',
        description: 'show ID',
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
                property: 'show_events',
                type: 'array',
                items: new OA\Items(
                    properties: [
                        new OA\Property(property: 'id', type: 'integer', example: 1),
                        new OA\Property(property: 'show_id', type: 'integer', example: 1),
                        new OA\Property(property: 'date', type: 'string', example: '2025-08-01 00:20:02'),
                    ],
                    type: 'object'
                )
            )
        ]))]
    public function show(GatewayInterface $gateway, int $id): JsonResponse;
}
