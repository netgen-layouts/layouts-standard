<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Handler\Container;

use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Container\ColumnHandler;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ColumnHandler::class)]
final class ColumnHandlerTest extends TestCase
{
    private ColumnHandler $handler;

    protected function setUp(): void
    {
        $this->handler = new ColumnHandler();
    }

    public function testGetPlaceholderIdentifiers(): void
    {
        self::assertSame(['main'], $this->handler->getPlaceholderIdentifiers());
    }
}
