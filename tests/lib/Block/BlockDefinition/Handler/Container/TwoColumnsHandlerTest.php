<?php

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Handler\Container;

use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\TwoColumnsHandler;
use PHPUnit\Framework\TestCase;

class TwoColumnsHandlerTest extends TestCase
{
    /**
     * @var \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\TwoColumnsHandler
     */
    private $handler;

    public function setUp()
    {
        $this->handler = new TwoColumnsHandler();
    }

    /**
     * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\TwoColumnsHandler::getPlaceholderIdentifiers
     */
    public function testGetPlaceholderIdentifiers()
    {
        $this->assertEquals(array('left', 'right'), $this->handler->getPlaceholderIdentifiers());
    }
}
