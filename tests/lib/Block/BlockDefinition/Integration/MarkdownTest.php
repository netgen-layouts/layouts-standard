<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration;

use Michelf\Markdown;
use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\MarkdownHandler;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;

abstract class MarkdownTest extends BlockTest
{
    /**
     * @return \Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface
     */
    public function createBlockDefinitionHandler()
    {
        return new MarkdownHandler(new Markdown());
    }

    /**
     * @return array
     */
    public function parametersDataProvider()
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

    /**
     * @return array
     */
    public function invalidParametersDataProvider()
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
