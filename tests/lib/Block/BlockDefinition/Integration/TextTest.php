<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\TextHandler;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;

abstract class TextTest extends BlockTest
{
    /**
     * @return \Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface
     */
    public function createBlockDefinitionHandler()
    {
        return new TextHandler();
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
                    'content' => 'Text',
                ],
            ],
            [
                [
                    'content' => 'New Text',
                ],
                [
                    'content' => 'New Text',
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
