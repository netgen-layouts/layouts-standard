<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\HtmlSnippetHandler;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;

abstract class HtmlSnippetTest extends BlockTest
{
    /**
     * @return \Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface
     */
    public function createBlockDefinitionHandler()
    {
        return new HtmlSnippetHandler();
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
