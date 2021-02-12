<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Handler\Container;

use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Container\FourColumnsHandler;
use PHPUnit\Framework\TestCase;

final class FourColumnsHandlerTest extends TestCase
{
    private FourColumnsHandler $handler;

    protected function setUp(): void
    {
        $this->handler = new FourColumnsHandler();
    }

    /**
     * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Container\FourColumnsHandler::getPlaceholderIdentifiers
     */
    public function testGetPlaceholderIdentifiers(): void
    {
        self::assertSame(['left', 'center_left', 'center_right', 'right'], $this->handler->getPlaceholderIdentifiers());
    }
}
