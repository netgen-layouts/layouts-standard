<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\MapHandler;
use Netgen\Layouts\Tests\Block\BlockDefinition\Integration\BlockTestCase;

abstract class MapTestBase extends BlockTestCase
{
    public static function parametersDataProvider(): iterable
    {
        return [
            [
                [],
                [
                    'latitude' => 0,
                ],
            ],
            [
                [
                    'latitude' => 42,
                ],
                [
                    'latitude' => 42,
                ],
            ],
            [
                [],
                [
                    'longitude' => 0,
                ],
            ],
            [
                [
                    'longitude' => 42,
                ],
                [
                    'longitude' => 42,
                ],
            ],
            [
                [],
                [
                    'zoom' => 5,
                ],
            ],
            [
                [
                    'zoom' => 6,
                ],
                [
                    'zoom' => 6,
                ],
            ],
            [
                [],
                [
                    'map_type' => 'ROADMAP',
                ],
            ],
            [
                [
                    'map_type' => 'TERRAIN',
                ],
                [
                    'map_type' => 'TERRAIN',
                ],
            ],
            [
                [],
                [
                    'show_marker' => true,
                ],
            ],
            [
                [
                    'show_marker' => null,
                ],
                [
                    'show_marker' => null,
                ],
            ],
            [
                [
                    'show_marker' => false,
                ],
                [
                    'show_marker' => false,
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

    public static function invalidParametersDataProvider(): iterable
    {
        return [
            [
                [
                    'latitude' => null,
                ],
            ],
            [
                [
                    'latitude' => -100,
                ],
            ],
            [
                [
                    'latitude' => 'lat',
                ],
            ],
            [
                [
                    'longitude' => null,
                ],
            ],
            [
                [
                    'longitude' => -200,
                ],
            ],
            [
                [
                    'longitude' => 'long',
                ],
            ],
            [
                [
                    'zoom' => null,
                ],
            ],
            [
                [
                    'zoom' => 10,
                ],
            ],
            [
                [
                    'zoom' => 'zoom',
                ],
            ],
            [
                [
                    'map_type' => null,
                ],
            ],
            [
                [
                    'map_type' => 'unknown',
                ],
            ],
            [
                [
                    'map_type' => 42,
                ],
            ],
            [
                [
                    'show_marker' => 42,
                ],
            ],
        ];
    }

    protected function createBlockDefinitionHandler(): BlockDefinitionHandlerInterface
    {
        return new MapHandler(3, 7, ['ROADMAP' => 'Roadmap', 'TERRAIN' => 'Terrain']);
    }
}
