<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Handler\Container;

use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Container\ThreeColumnsHandler;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ThreeColumnsHandler::class)]
final class ThreeColumnsHandlerTest extends TestCase
{
    private ThreeColumnsHandler $handler;

    protected function setUp(): void
    {
        $this->handler = new ThreeColumnsHandler();
    }

    public function testGetPlaceholderIdentifiers(): void
    {
        self::assertSame(['left', 'center', 'right'], $this->handler->getPlaceholderIdentifiers());
    }
}
