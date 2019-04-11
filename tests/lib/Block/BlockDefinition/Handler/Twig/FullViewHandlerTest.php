<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Handler\Twig;

use Netgen\Layouts\API\Values\Block\Block;
use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Twig\FullViewHandler;
use PHPUnit\Framework\TestCase;

final class FullViewHandlerTest extends TestCase
{
    /**
     * @var \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Twig\FullViewHandler
     */
    private $handler;

    public function setUp(): void
    {
        $this->handler = new FullViewHandler('content');
    }

    /**
     * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Twig\FullViewHandler::isContextual
     */
    public function testIsContextual(): void
    {
        self::assertTrue($this->handler->isContextual(new Block()));
    }

    /**
     * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Twig\FullViewHandler::__construct
     * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Twig\FullViewHandler::getTwigBlockName
     */
    public function testGetTwigBlockName(): void
    {
        self::assertSame('content', $this->handler->getTwigBlockName(new Block()));
    }
}
