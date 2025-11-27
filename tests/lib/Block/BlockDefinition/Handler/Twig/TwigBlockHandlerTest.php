<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Handler\Twig;

use Netgen\Layouts\API\Values\Block\Block;
use Netgen\Layouts\Parameters\Parameter;
use Netgen\Layouts\Parameters\ParameterList;
use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Twig\TwigBlockHandler;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TwigBlockHandler::class)]
final class TwigBlockHandlerTest extends TestCase
{
    private TwigBlockHandler $handler;

    protected function setUp(): void
    {
        $this->handler = new TwigBlockHandler();
    }

    public function testGetTwigBlockNames(): void
    {
        $block = Block::fromArray(
            [
                'availableLocales' => ['en'],
                'locale' => 'en',
                'parameters' => new ParameterList(
                    [
                        'block_name' => Parameter::fromArray(
                            [
                                'value' => 'twig_block',
                            ],
                        ),
                    ],
                ),
            ],
        );

        self::assertSame(['twig_block'], $this->handler->getTwigBlockNames($block));
    }
}
