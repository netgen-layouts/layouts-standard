<?php

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\ExternalVideoHandler;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;

abstract class ExternalVideoTest extends BlockTest
{
    /**
     * @return \Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface
     */
    public function createBlockDefinitionHandler()
    {
        return new ExternalVideoHandler(['youtube' => 'YouTube', 'vimeo' => 'Vimeo']);
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
                    'service' => 'youtube',
                ],
            ],
            [
                [
                    'service' => 'vimeo',
                ],
                [
                    'service' => 'vimeo',
                ],
            ],
            [
                [
                ],
                [
                    'video_id' => null,
                ],
            ],
            [
                [
                    'video_id' => null,
                ],
                [
                    'video_id' => null,
                ],
            ],
            [
                [
                    'video_id' => '',
                ],
                [
                    'video_id' => '',
                ],
            ],
            [
                [
                    'video_id' => '12345',
                ],
                [
                    'video_id' => '12345',
                ],
            ],
            [
                [
                ],
                [
                    'caption' => null,
                ],
            ],
            [
                [
                    'caption' => null,
                ],
                [
                    'caption' => null,
                ],
            ],
            [
                [
                    'caption' => '',
                ],
                [
                    'caption' => '',
                ],
            ],
            [
                [
                    'caption' => 'A caption',
                ],
                [
                    'caption' => 'A caption',
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
                    'service' => 42,
                ],
            ],
            [
                [
                    'service' => 'dailymotion',
                ],
            ],
            [
                [
                    'video_id' => 42,
                ],
            ],
            [
                [
                    'caption' => 42,
                ],
            ],
        ];
    }
}
