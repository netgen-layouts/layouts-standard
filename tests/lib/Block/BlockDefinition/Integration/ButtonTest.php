<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\BlockManager\Parameters\Value\LinkValue;
use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\ButtonHandler;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;

abstract class ButtonTest extends BlockTest
{
    /**
     * @return \Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface
     */
    public function createBlockDefinitionHandler()
    {
        return new ButtonHandler(
            [
                'default_button' => 'Default button',
                'highlighted_button' => 'Highlighted button',
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
                    'text' => 'Text',
                ],
            ],
            [
                [
                    'text' => 'New text',
                ],
                [
                    'text' => 'New text',
                ],
            ],
            [
                [],
                [
                    'style' => 'default_button',
                ],
            ],
            [
                [
                    'style' => 'highlighted_button',
                ],
                [
                    'style' => 'highlighted_button',
                ],
            ],
            [
                [],
                [
                    'link' => new LinkValue(),
                ],
            ],
            [
                [
                    'link' => new LinkValue(
                        [
                            'linkType' => LinkValue::LINK_TYPE_URL,
                            'link' => 'http://www.netgenlabs.com',
                        ]
                    ),
                ],
                [
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
                    'link' => new LinkValue(
                        [
                            'linkType' => LinkValue::LINK_TYPE_INTERNAL,
                            'link' => 'value://42',
                        ]
                    ),
                ],
                [
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
                    'text' => null,
                ],
            ],
            [
                [
                    'text' => '',
                ],
            ],
            [
                [
                    'text' => 42,
                ],
            ],
            [
                [
                    'style' => null,
                ],
            ],
            [
                [
                    'style' => 42,
                ],
            ],
        ];
    }
}
