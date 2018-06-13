<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\HtmlSnippetHandler;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;

abstract class HtmlSnippetTest extends BlockTest
{
    public function createBlockDefinitionHandler(): BlockDefinitionHandlerInterface
    {
        return new HtmlSnippetHandler();
    }

    public function parametersDataProvider(): array
    {
        return [
            [
                [],
                [
                    'content' => null,
                ],
            ],
            [
                [
                    'content' => null,
                ],
                [
                    'content' => null,
                ],
            ],
            [
                [
                    'content' => '',
                ],
                [
                    'content' => '',
                ],
            ],
            [
                [
                    'content' => '<b>Text</b>',
                ],
                [
                    'content' => '<b>Text</b>',
                ],
            ],
            [
                [
                    'unknown' => 'unknown',
                ],
                [],
            ],
        ];
    }

    public function invalidParametersDataProvider(): array
    {
        return [
            [
                [
                    'content' => 42,
                ],
            ],
        ];
    }
}
