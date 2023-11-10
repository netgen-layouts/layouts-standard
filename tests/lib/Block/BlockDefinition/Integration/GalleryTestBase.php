<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\GalleryHandler;
use Netgen\Layouts\Tests\Block\BlockDefinition\Integration\BlockTestCase;

abstract class GalleryTestBase extends BlockTestCase
{
    public function hasCollection(): bool
    {
        return true;
    }

    public static function parametersDataProvider(): iterable
    {
        return [
            [
                [],
                [
                    'next_and_previous' => null,
                ],
            ],
            [
                [
                    'next_and_previous' => false,
                ],
                [
                    'next_and_previous' => false,
                ],
            ],
            [
                [
                    'show_pagination' => true,
                ],
                [
                    'show_pagination' => true,
                ],
            ],
            [
                [],
                [
                    'infinite_loop' => null,
                ],
            ],
            [
                [
                    'infinite_loop' => false,
                ],
                [
                    'infinite_loop' => false,
                ],
            ],
            [
                [],
                [
                    'transition' => 'slide',
                ],
            ],
            [
                [
                    'transition' => 'fade',
                ],
                [
                    'transition' => 'fade',
                ],
            ],
            [
                [
                    'autoplay' => true,
                ],
                [
                    'autoplay' => true,
                    'autoplay_time' => 3,
                ],
            ],
            [
                [
                    'autoplay' => true,
                    'autoplay_time' => 5,
                ],
                [
                    'autoplay' => true,
                    'autoplay_time' => 5,
                ],
            ],
            [
                [],
                [
                    'number_of_thumbnails' => 1,
                ],
            ],
            [
                [
                    'number_of_thumbnails' => 16,
                ],
                [
                    'number_of_thumbnails' => 16,
                ],
            ],
            [
                [
                    'show_details' => true,
                ],
                [
                    'show_details' => true,
                    'show_details_on_hover' => null,
                ],
            ],
            [
                [
                    'show_details' => true,
                    'show_details_on_hover' => false,
                ],
                [
                    'show_details' => true,
                    'show_details_on_hover' => false,
                ],
            ],
            [
                [],
                [
                    'enable_lightbox' => null,
                ],
            ],
            [
                [
                    'enable_lightbox' => false,
                ],
                [
                    'enable_lightbox' => false,
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
                    'next_and_previous' => 42,
                ],
            ],
            [
                [
                    'show_pagination' => 42,
                ],
            ],
            [
                [
                    'infinite_loop' => 42,
                ],
            ],
            [
                [
                    'transition' => null,
                ],
            ],
            [
                [
                    'transition' => 'unknown',
                ],
            ],
            [
                [
                    'autoplay' => 42,
                ],
            ],
            [
                [
                    'autoplay' => true,
                    'autoplay_time' => 15,
                ],
            ],
            [
                [
                    'autoplay' => true,
                    'autoplay_time' => '15',
                ],
            ],
            [
                [
                    'number_of_thumbnails' => null,
                ],
            ],
            [
                [
                    'number_of_thumbnails' => 0,
                ],
            ],
            [
                [
                    'number_of_thumbnails' => '16',
                ],
            ],
            [
                [
                    'show_details' => 42,
                ],
            ],
            [
                [
                    'show_details' => true,
                    'show_details_on_hover' => 42,
                ],
            ],
            [
                [
                    'enable_lightbox' => 42,
                ],
            ],
        ];
    }

    protected function createBlockDefinitionHandler(): BlockDefinitionHandlerInterface
    {
        return new GalleryHandler(
            3,
            7,
            [
                'slide' => 'Slide',
                'fade' => 'Fade',
            ],
        );
    }
}
