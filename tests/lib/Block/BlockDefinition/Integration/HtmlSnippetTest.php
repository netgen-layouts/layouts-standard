<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;
use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\HtmlSnippetHandler;

abstract class HtmlSnippetTest extends BlockTest
{
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

    protected function createBlockDefinitionHandler(): BlockDefinitionHandlerInterface
    {
        return new HtmlSnippetHandler();
    }
}
