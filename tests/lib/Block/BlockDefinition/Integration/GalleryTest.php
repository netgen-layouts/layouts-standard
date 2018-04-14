<?php

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\GalleryHandler;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;

abstract class GalleryTest extends BlockTest
{
    /**
     * @return \Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface
     */
    public function createBlockDefinitionHandler()
    {
        return new GalleryHandler(
            3,
            7,
            array(
                'slide' => 'Slide',
                'fade' => 'Fade',
            ),
            array(
                '16_9' => '16:9',
                '4_3' => '4:3',
            )
        );
    }

    /**
     * @return bool
     */
    public function hasCollection()
    {
        return true;
    }

    /**
     * @return array
     */
    public function parametersDataProvider()
    {
        return array(
            array(
                array(),
                array(
                    'next_and_previous' => null,
                ),
            ),
            array(
                array(
                    'next_and_previous' => false,
                ),
                array(
                    'next_and_previous' => false,
                ),
            ),
            array(
                array(
                    'show_pagination' => true,
                ),
                array(
                    'show_pagination' => true,
                ),
            ),
            array(
                array(),
                array(
                    'infinite_loop' => null,
                ),
            ),
            array(
                array(
                    'infinite_loop' => false,
                ),
                array(
                    'infinite_loop' => false,
                ),
            ),
            array(
                array(),
                array(
                    'transition' => 'slide',
                ),
            ),
            array(
                array(
                    'transition' => 'fade',
                ),
                array(
                    'transition' => 'fade',
                ),
            ),
            array(
                array(
                    'autoplay' => true,
                ),
                array(
                    'autoplay' => true,
                    'autoplay_time' => 3,
                ),
            ),
            array(
                array(
                    'autoplay' => true,
                    'autoplay_time' => 5,
                ),
                array(
                    'autoplay' => true,
                    'autoplay_time' => 5,
                ),
            ),
            array(
                array(),
                array(
                    'number_of_thumbnails' => 1,
                ),
            ),
            array(
                array(
                    'number_of_thumbnails' => 16,
                ),
                array(
                    'number_of_thumbnails' => 16,
                ),
            ),
            array(
                array(
                    'show_details' => true,
                ),
                array(
                    'show_details' => true,
                    'show_details_on_hover' => null,
                ),
            ),
            array(
                array(
                    'show_details' => true,
                    'show_details_on_hover' => false,
                ),
                array(
                    'show_details' => true,
                    'show_details_on_hover' => false,
                ),
            ),
            array(
                array(),
                array(
                    'enable_lightbox' => null,
                ),
            ),
            array(
                array(
                    'enable_lightbox' => false,
                ),
                array(
                    'enable_lightbox' => false,
                ),
            ),
            array(
                array(
                    'unknown' => 'unknown',
                ),
                array(),
            ),
        );
    }

    /**
     * @return array
     */
    public function invalidParametersDataProvider()
    {
        return array(
            array(
                array(
                    'next_and_previous' => 42,
                ),
            ),
            array(
                array(
                    'show_pagination' => 42,
                ),
            ),
            array(
                array(
                    'infinite_loop' => 42,
                ),
            ),
            array(
                array(
                    'transition' => null,
                ),
            ),
            array(
                array(
                    'transition' => 'unknown',
                ),
            ),
            array(
                array(
                    'autoplay' => 42,
                ),
            ),
            array(
                array(
                    'autoplay' => true,
                    'autoplay_time' => 15,
                ),
            ),
            array(
                array(
                    'autoplay' => true,
                    'autoplay_time' => '15',
                ),
            ),
            array(
                array(
                    'number_of_thumbnails' => null,
                ),
            ),
            array(
                array(
                    'number_of_thumbnails' => 0,
                ),
            ),
            array(
                array(
                    'number_of_thumbnails' => '16',
                ),
            ),
            array(
                array(
                    'show_details' => 42,
                ),
            ),
            array(
                array(
                    'show_details' => true,
                    'show_details_on_hover' => 42,
                ),
            ),
            array(
                array(
                    'enable_lightbox' => 42,
                ),
            ),
        );
    }
}
