<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Handler\Container;

use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Container\FourColumnsHandler;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(FourColumnsHandler::class)]
final class FourColumnsHandlerTest extends TestCase
{
    private FourColumnsHandler $handler;

    protected function setUp(): void
    {
        $this->handler = new FourColumnsHandler();
    }

    public function testGetPlaceholderIdentifiers(): void
    {
        self::assertSame(['left', 'center_left', 'center_right', 'right'], $this->handler->getPlaceholderIdentifiers());
    }
}
