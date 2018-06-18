<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Handler\Container;

use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\FourColumnsHandler;
use PHPUnit\Framework\TestCase;

final class FourColumnsHandlerTest extends TestCase
{
    /**
     * @var \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\FourColumnsHandler
     */
    private $handler;

    public function setUp(): void
    {
        $this->handler = new FourColumnsHandler();
    }

    /**
     * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\FourColumnsHandler::getPlaceholderIdentifiers
     */
    public function testGetPlaceholderIdentifiers(): void
    {
        $this->assertSame(['left', 'center_left', 'center_right', 'right'], $this->handler->getPlaceholderIdentifiers());
    }
}
