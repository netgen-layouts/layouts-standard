<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;
use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Twig\TwigBlockHandler;

abstract class TwigBlockTest extends BlockTest
{
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

    protected function createBlockDefinitionHandler(): BlockDefinitionHandlerInterface
    {
        return new TwigBlockHandler();
    }
}
