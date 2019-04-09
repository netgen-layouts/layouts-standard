<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Handler\Container;

use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Container\ThreeColumnsHandler;
use PHPUnit\Framework\TestCase;

final class ThreeColumnsHandlerTest extends TestCase
{
    /**
     * @var \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Container\ThreeColumnsHandler
     */
    private $handler;

    public function setUp(): void
    {
        $this->handler = new ThreeColumnsHandler();
    }

    /**
     * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Container\ThreeColumnsHandler::getPlaceholderIdentifiers
     */
    public function testGetPlaceholderIdentifiers(): void
    {
        self::assertSame(['left', 'center', 'right'], $this->handler->getPlaceholderIdentifiers());
    }
}
