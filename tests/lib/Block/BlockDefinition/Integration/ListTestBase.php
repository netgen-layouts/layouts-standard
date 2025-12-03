<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\ListHandler;
use Netgen\Layouts\Tests\Block\BlockDefinition\Integration\BlockTestCase;

abstract class ListTestBase extends BlockTestCase
{
    final public static function parametersDataProvider(): iterable
    {
        return [
            [
                [],
                [
                    'number_of_columns' => 2,
                ],
            ],
            [
                [
                    'number_of_columns' => 3,
                ],
                [
                    'number_of_columns' => 3,
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
                    'number_of_columns' => null,
                ],
            ],
            [
                [
                    'number_of_columns' => '2',
                ],
            ],
        ];
    }

    final protected function hasCollection(): true
    {
        return true;
    }

    final protected function createBlockDefinitionHandler(): BlockDefinitionHandlerInterface
    {
        return new ListHandler(
            [
                2 => '2 columns',
                3 => '3 columns',
            ],
        );
    }
}
