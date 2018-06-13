<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Twig\TwigBlockHandler;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;

abstract class TwigBlockTest extends BlockTest
{
    public function createBlockDefinitionHandler(): BlockDefinitionHandlerInterface
    {
        return new TwigBlockHandler();
    }

    public function parametersDataProvider(): array
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

    public function invalidParametersDataProvider(): array
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
