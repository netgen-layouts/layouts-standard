<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\ExternalVideoHandler;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;

abstract class ExternalVideoTest extends BlockTest
{
    public function parametersDataProvider(): array
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

    public function invalidParametersDataProvider(): array
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

    protected function createBlockDefinitionHandler(): BlockDefinitionHandlerInterface
    {
        return new ExternalVideoHandler(['youtube' => 'YouTube', 'vimeo' => 'Vimeo']);
    }
}
