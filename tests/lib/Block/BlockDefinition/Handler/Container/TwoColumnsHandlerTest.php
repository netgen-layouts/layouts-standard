<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Handler\Container;

use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\TwoColumnsHandler;
use PHPUnit\Framework\TestCase;

final class TwoColumnsHandlerTest extends TestCase
{
    /**
     * @var \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\TwoColumnsHandler
     */
    private $handler;

    public function setUp(): void
    {
        $this->handler = new TwoColumnsHandler();
    }

    /**
     * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container\TwoColumnsHandler::getPlaceholderIdentifiers
     */
    public function testGetPlaceholderIdentifiers(): void
    {
        self::assertSame(['left', 'right'], $this->handler->getPlaceholderIdentifiers());
    }
}
