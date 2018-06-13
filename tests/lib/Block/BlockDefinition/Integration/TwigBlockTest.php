<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Twig\TwigBlockHandler;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;

abstract class TwigBlockTest extends BlockTest
{
    /**
     * @return \Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface
     */
    public function createBlockDefinitionHandler()
    {
        return new TwigBlockHandler();
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
                    'block_name' => null,
                ],
            ],
            [
                [
                    'block_name' => null,
                ],
                [
                    'block_name' => null,
                ],
            ],
            [
                [
                    'block_name' => '',
                ],
                [
                    'block_name' => '',
                ],
            ],
            [
                [
                    'block_name' => 'block',
                ],
                [
                    'block_name' => 'block',
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
                    'block_name' => 42,
                ],
            ],
        ];
    }
}
