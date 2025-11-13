<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Handler\Twig;

use Netgen\Layouts\API\Values\Block\Block;
use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Twig\FullViewHandler;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(FullViewHandler::class)]
final class FullViewHandlerTest extends TestCase
{
    private FullViewHandler $handler;

    protected function setUp(): void
    {
        $this->handler = new FullViewHandler(['content', 'body']);
    }

    public function testGetTwigBlockNames(): void
    {
        self::assertSame(['content', 'body'], $this->handler->getTwigBlockNames(new Block()));
    }
}
