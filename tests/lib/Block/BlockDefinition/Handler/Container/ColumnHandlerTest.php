<?php

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Handler\Container;

use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\ColumnHandler;
use PHPUnit\Framework\TestCase;

final class ColumnHandlerTest extends TestCase
{
    /**
     * @var \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\ColumnHandler
     */
    private $handler;

    public function setUp()
    {
        $this->handler = new ColumnHandler();
    }

    /**
     * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\ColumnHandler::getPlaceholderIdentifiers
     */
    public function testGetPlaceholderIdentifiers()
    {
        $this->assertEquals(array('main'), $this->handler->getPlaceholderIdentifiers());
    }
}
