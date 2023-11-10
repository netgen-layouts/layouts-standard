<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\ExternalVideoHandler;
use Netgen\Layouts\Tests\Block\BlockDefinition\Integration\BlockTestCase;

abstract class ExternalVideoTestBase extends BlockTestCase
{
    public static function parametersDataProvider(): iterable
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

    public static function invalidParametersDataProvider(): iterable
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
