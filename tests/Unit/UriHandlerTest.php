<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Helpers\UriHandler;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversFunction;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(UriHandler::class)]
#[CoversFunction('normalize')]
class UriHandlerTest extends TestCase
{
    #[Test]
    public function test_correct_trim_slashes_in_uri(): void
    {
        $this->assertEquals('shows', UriHandler::normalize('/shows/'));
    }
}
