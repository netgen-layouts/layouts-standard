<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration;

use Michelf\Markdown;
use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\MarkdownHandler;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;

abstract class MarkdownTest extends BlockTest
{
    public function createBlockDefinitionHandler(): BlockDefinitionHandlerInterface
    {
        return new MarkdownHandler(new Markdown());
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
                    'content' => '* Text',
                ],
                [
                    'content' => '* Text',
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
