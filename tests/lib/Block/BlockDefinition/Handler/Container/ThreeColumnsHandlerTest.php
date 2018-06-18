<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Handler\Container;

use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\ThreeColumnsHandler;
use PHPUnit\Framework\TestCase;

final class ThreeColumnsHandlerTest extends TestCase
{
    /**
     * @var \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\ThreeColumnsHandler
     */
    private $handler;

    public function setUp(): void
    {
        $this->handler = new ThreeColumnsHandler();
    }

    /**
     * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\ThreeColumnsHandler::getPlaceholderIdentifiers
     */
    public function testGetPlaceholderIdentifiers(): void
    {
        $this->assertSame(['left', 'center', 'right'], $this->handler->getPlaceholderIdentifiers());
    }
}
