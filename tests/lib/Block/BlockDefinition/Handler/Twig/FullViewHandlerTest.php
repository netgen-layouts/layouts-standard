<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Handler\Twig;

use Netgen\BlockManager\Core\Values\Block\Block;
use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Twig\FullViewHandler;
use PHPUnit\Framework\TestCase;

final class FullViewHandlerTest extends TestCase
{
    /**
     * @var \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Twig\FullViewHandler
     */
    private $handler;

    public function setUp(): void
    {
        $this->handler = new FullViewHandler('content');
    }

    /**
     * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Twig\FullViewHandler::isContextual
     */
    public function testIsContextual(): void
    {
        $this->assertTrue($this->handler->isContextual(new Block()));
    }

    /**
     * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Twig\FullViewHandler::__construct
     * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Twig\FullViewHandler::getTwigBlockName
     */
    public function testGetTwigBlockName(): void
    {
        $this->assertEquals('content', $this->handler->getTwigBlockName(new Block()));
    }
}
