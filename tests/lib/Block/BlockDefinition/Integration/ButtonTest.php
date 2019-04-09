<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\BlockManager\Parameters\Value\LinkValue;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;
use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\ButtonHandler;

abstract class ButtonTest extends BlockTest
{
    public function parametersDataProvider(): array
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
                    'link' => [
                        'link_type' => LinkValue::LINK_TYPE_URL,
                        'link' => 'http://www.netgenlabs.com',
                    ],
                ],
                [
                    'link' => LinkValue::fromArray(
                        [
                            'linkType' => LinkValue::LINK_TYPE_URL,
                            'link' => 'http://www.netgenlabs.com',
                        ]
                    ),
                ],
            ],
            [
                [
                    'link' => [
                        'link_type' => LinkValue::LINK_TYPE_INTERNAL,
                        'link' => 'value://42',
                    ],
                ],
                [
                    'link' => LinkValue::fromArray(
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

    public function invalidParametersDataProvider(): array
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

    protected function createBlockDefinitionHandler(): BlockDefinitionHandlerInterface
    {
        return new ButtonHandler(
            [
                'default_button' => 'Default button',
                'highlighted_button' => 'Highlighted button',
            ],
            ['value']
        );
    }
}
