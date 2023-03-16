<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Handler;

use Netgen\Layouts\API\Values\Block\Block;
use Netgen\Layouts\Block\DynamicParameters;
use Netgen\Layouts\Parameters\Parameter;
use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\MarkdownHandler;
use Netgen\Layouts\Standard\Utils\Markdown;
use Netgen\Layouts\Utils\HtmlPurifier;
use PHPUnit\Framework\TestCase;

final class MarkdownHandlerTest extends TestCase
{
    private MarkdownHandler $handler;

    protected function setUp(): void
    {
        $this->handler = new MarkdownHandler(new Markdown(new HtmlPurifier()));
    }

    /**
     * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\MarkdownHandler::__construct
     * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\MarkdownHandler::getDynamicParameters
     */
    public function testGetDynamicParameters(): void
    {
        $block = Block::fromArray(
            [
                'availableLocales' => ['en'],
                'locale' => 'en',
                'parameters' => [
                    'content' => Parameter::fromArray(
                        [
                            'value' => '# Title',
                        ],
                    ),
                ],
            ],
        );

        $dynamicParameters = new DynamicParameters();

        $this->handler->getDynamicParameters($dynamicParameters, $block);

        self::assertTrue($dynamicParameters->offsetExists('html'));
        self::assertSame('<h1>Title</h1>', $dynamicParameters['html']);
    }
}
