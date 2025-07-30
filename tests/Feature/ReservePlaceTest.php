<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Http\Controllers\Gateway\EventController;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversFunction;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(EventController::class)]
#[CoversFunction('reserve')]
class ReservePlaceTest extends TestCase
{
    use WithFaker;

    #[Test]
    public function test_example(): void
    {
        $response = $this->postJson(route('events.reserve', rand(1, 10)), [
            'name' => $this->faker->firstName,
            'places' => [1,2,3]
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'reserve_number'
        ]);
    }
}
