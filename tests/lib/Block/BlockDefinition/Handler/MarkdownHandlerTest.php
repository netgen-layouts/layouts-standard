<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Handler;

use Netgen\BlockManager\Block\DynamicParameters;
use Netgen\BlockManager\Core\Values\Block\Block;
use Netgen\BlockManager\Parameters\Parameter;
use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\MarkdownHandler;
use Netgen\BlockManager\Standard\Utils\Markdown;
use Netgen\BlockManager\Utils\HtmlPurifier;
use PHPUnit\Framework\TestCase;

final class MarkdownHandlerTest extends TestCase
{
    /**
     * @var \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\MarkdownHandler
     */
    private $handler;

    public function setUp(): void
    {
        $this->handler = new MarkdownHandler(new Markdown(new HtmlPurifier()));
    }

    /**
     * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\MarkdownHandler::__construct
     * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\MarkdownHandler::getDynamicParameters
     */
    public function testGetDynamicParameters(): void
    {
        $block = new Block(
            [
                'availableLocales' => ['en'],
                'locale' => 'en',
                'parameters' => [
                    'content' => new Parameter(
                        [
                            'value' => '# Title',
                        ]
                    ),
                ],
            ]
        );

        $dynamicParameters = new DynamicParameters();

        $this->handler->getDynamicParameters($dynamicParameters, $block);

        $this->assertArrayHasKey('html', $dynamicParameters);
        $this->assertSame('<h1>Title</h1>', $dynamicParameters['html']);
    }
}
