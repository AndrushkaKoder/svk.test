<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Services\Interfaces\GatewayInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversFunction;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(GatewayInterface::class)]
#[CoversFunction('getShows')]
class GatewayMockTest extends TestCase
{
    #[Test]
    public function test_get_shows_from_mock_gateway(): void
    {
        $mock = $this->mock(GatewayInterface::class);

        $mock->shouldReceive('getShows')->once()->andReturn(['success' => true, 'shows' => []]);

        $response = $this->getJson(route('shows.index'));

        $response->assertOk();
        $response->assertJsonStructure([
            'success',
            'shows'
        ]);
    }
}
