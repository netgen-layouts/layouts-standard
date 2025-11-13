<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Handler\Container;

use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Container\TwoColumnsHandler;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TwoColumnsHandler::class)]
final class TwoColumnsHandlerTest extends TestCase
{
    private TwoColumnsHandler $handler;

    protected function setUp(): void
    {
        $this->handler = new TwoColumnsHandler();
    }

    public function testGetPlaceholderIdentifiers(): void
    {
        self::assertSame(['left', 'right'], $this->handler->getPlaceholderIdentifiers());
    }
}
