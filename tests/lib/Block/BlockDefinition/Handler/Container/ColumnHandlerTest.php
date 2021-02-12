<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Handler\Container;

use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Container\ColumnHandler;
use PHPUnit\Framework\TestCase;

final class ColumnHandlerTest extends TestCase
{
    private ColumnHandler $handler;

    protected function setUp(): void
    {
        $this->handler = new ColumnHandler();
    }

    /**
     * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Container\ColumnHandler::getPlaceholderIdentifiers
     */
    public function testGetPlaceholderIdentifiers(): void
    {
        self::assertSame(['main'], $this->handler->getPlaceholderIdentifiers());
    }
}
