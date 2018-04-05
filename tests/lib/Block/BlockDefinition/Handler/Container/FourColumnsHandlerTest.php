<?php

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Handler\Container;

use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\FourColumnsHandler;
use PHPUnit\Framework\TestCase;

final class FourColumnsHandlerTest extends TestCase
{
    /**
     * @var \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\FourColumnsHandler
     */
    private $handler;

    public function setUp()
    {
        $this->handler = new FourColumnsHandler();
    }

    /**
     * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\FourColumnsHandler::getPlaceholderIdentifiers
     */
    public function testGetPlaceholderIdentifiers()
    {
        $this->assertEquals(array('left', 'center_left', 'center_right', 'right'), $this->handler->getPlaceholderIdentifiers());
    }
}
