<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Handler\Container;

use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\ColumnHandler;
use PHPUnit\Framework\TestCase;

final class ColumnHandlerTest extends TestCase
{
    /**
     * @var \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\ColumnHandler
     */
    private $handler;

    public function setUp(): void
    {
        $this->handler = new ColumnHandler();
    }

    /**
     * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\ColumnHandler::getPlaceholderIdentifiers
     */
    public function testGetPlaceholderIdentifiers()
    {
        $this->assertEquals(['main'], $this->handler->getPlaceholderIdentifiers());
    }
}
