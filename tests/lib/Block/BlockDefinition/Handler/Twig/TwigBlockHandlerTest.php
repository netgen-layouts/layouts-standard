<?php

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Handler\Twig;

use Netgen\BlockManager\Core\Values\Block\Block;
use Netgen\BlockManager\Parameters\Parameter;
use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Twig\TwigBlockHandler;
use PHPUnit\Framework\TestCase;

final class TwigBlockHandlerTest extends TestCase
{
    /**
     * @var \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Twig\TwigBlockHandler
     */
    private $handler;

    public function setUp()
    {
        $this->handler = new TwigBlockHandler();
    }

    /**
     * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Twig\TwigBlockHandler::isContextual
     */
    public function testIsContextual()
    {
        $this->assertTrue($this->handler->isContextual(new Block()));
    }

    /**
     * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Twig\TwigBlockHandler::getTwigBlockName
     */
    public function testGetTwigBlockName()
    {
        $block = new Block(
            [
                'availableLocales' => ['en'],
                'locale' => 'en',
                'parameters' => [
                    'block_name' => new Parameter(
                        [
                            'value' => 'twig_block',
                        ]
                    ),
                ],
            ]
        );

        $this->assertEquals('twig_block', $this->handler->getTwigBlockName($block));
    }
}
