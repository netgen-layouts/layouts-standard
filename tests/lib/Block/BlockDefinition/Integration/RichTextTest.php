<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\RichTextHandler;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;

abstract class RichTextTest extends BlockTest
{
    public function createBlockDefinitionHandler(): BlockDefinitionHandlerInterface
    {
        return new RichTextHandler();
    }

    public function parametersDataProvider(): array
    {
        return [
            [
                [],
                [
                    'content' => 'Text',
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
                    'content' => null,
                ],
            ],
            [
                [
                    'content' => '',
                ],
            ],
            [
                [
                    'content' => 42,
                ],
            ],
        ];
    }
}
