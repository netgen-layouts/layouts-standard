<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\Layouts\Parameters\Value\LinkValue;
use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\ButtonHandler;
use Netgen\Layouts\Tests\Block\BlockDefinition\Integration\BlockTestCase;

abstract class ButtonTestBase extends BlockTestCase
{
    public static function parametersDataProvider(): iterable
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
                        'link' => 'https://netgen.io',
                    ],
                ],
                [
                    'link' => LinkValue::fromArray(
                        [
                            'linkType' => LinkValue::LINK_TYPE_URL,
                            'link' => 'https://netgen.io',
                        ],
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
                        ],
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

    public static function invalidParametersDataProvider(): iterable
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
            ['value'],
        );
    }
}
