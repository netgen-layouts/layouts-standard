<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Twig\TwigBlockHandler;
use Netgen\Layouts\Tests\Block\BlockDefinition\Integration\BlockTestCase;

abstract class TwigBlockTestBase extends BlockTestCase
{
    final public static function parametersDataProvider(): iterable
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

    final public static function invalidParametersDataProvider(): iterable
    {
        return [
            [
                [
                    'block_name' => 42,
                ],
            ],
        ];
    }

    final protected function createBlockDefinitionHandler(): BlockDefinitionHandlerInterface
    {
        return new TwigBlockHandler();
    }
}
