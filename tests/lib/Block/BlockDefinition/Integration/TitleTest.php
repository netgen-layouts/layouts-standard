<?php

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\BlockManager\Parameters\Value\LinkValue;
use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\TitleHandler;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;

abstract class TitleTest extends BlockTest
{
    /**
     * @return \Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface
     */
    public function createBlockDefinitionHandler()
    {
        return new TitleHandler(
            [
                'h1' => 'Heading 1',
                'h2' => 'Heading 2',
            ],
            ['value']
        );
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
                    'tag' => 'h1',
                ],
            ],
            [
                [
                    'tag' => 'h2',
                ],
                [
                    'tag' => 'h2',
                ],
            ],
            [
                [],
                [
                    'title' => 'Title',
                ],
            ],
            [
                [
                    'title' => 'New title',
                ],
                [
                    'title' => 'New title',
                ],
            ],
            [
                [],
                [
                    'use_link' => null,
                    'link' => new LinkValue(),
                ],
            ],
            [
                [
                    'use_link' => true,
                    'link' => new LinkValue(
                        [
                            'linkType' => LinkValue::LINK_TYPE_URL,
                            'link' => 'http://www.netgenlabs.com',
                        ]
                    ),
                ],
                [
                    'use_link' => true,
                    'link' => new LinkValue(
                        [
                            'linkType' => LinkValue::LINK_TYPE_URL,
                            'link' => 'http://www.netgenlabs.com',
                        ]
                    ),
                ],
            ],
            [
                [
                    'use_link' => true,
                    'link' => new LinkValue(
                        [
                            'linkType' => LinkValue::LINK_TYPE_INTERNAL,
                            'link' => 'value://42',
                        ]
                    ),
                ],
                [
                    'use_link' => true,
                    'link' => new LinkValue(
                        [
                            'linkType' => LinkValue::LINK_TYPE_INTERNAL,
                            'link' => 'value://42',
                        ]
                    ),
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
                    'tag' => null,
                ],
            ],
            [
                [
                    'tag' => '',
                ],
            ],
            [
                [
                    'tag' => 42,
                ],
            ],
            [
                [
                    'title' => null,
                ],
            ],
            [
                [
                    'title' => '',
                ],
            ],
            [
                [
                    'title' => 42,
                ],
            ],
            [
                [
                    'use_link' => 42,
                ],
            ],
            [
                [
                    'link' => 42,
                ],
                ['use_link', 'link'],
            ],
        ];
    }
}
