<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\TextHandler;
use Netgen\Layouts\Tests\Block\BlockDefinition\Integration\BlockTestCase;

abstract class TextTestBase extends BlockTestCase
{
    final public static function parametersDataProvider(): iterable
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

    final public static function invalidParametersDataProvider(): iterable
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

    final protected function createBlockDefinitionHandler(): BlockDefinitionHandlerInterface
    {
        return new TextHandler();
    }
}
