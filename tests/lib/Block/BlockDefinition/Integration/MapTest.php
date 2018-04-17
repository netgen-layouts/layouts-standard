<?php

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\MapHandler;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;

abstract class MapTest extends BlockTest
{
    /**
     * @return \Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface
     */
    public function createBlockDefinitionHandler()
    {
        return new MapHandler(3, 7, ['ROADMAP' => 'Roadmap', 'TERRAIN' => 'Terrain']);
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

    /**
     * @return array
     */
    public function invalidParametersDataProvider()
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
}
