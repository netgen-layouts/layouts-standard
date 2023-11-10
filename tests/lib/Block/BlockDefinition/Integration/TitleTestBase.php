<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\Layouts\Parameters\Value\LinkValue;
use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\TitleHandler;
use Netgen\Layouts\Tests\Block\BlockDefinition\Integration\BlockTestCase;

abstract class TitleTestBase extends BlockTestCase
{
    public static function parametersDataProvider(): iterable
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
                    'link' => [
                        'link_type' => LinkValue::LINK_TYPE_URL,
                        'link' => 'https://netgen.io',
                    ],
                ],
                [
                    'use_link' => true,
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
                    'use_link' => true,
                    'link' => [
                        'link_type' => LinkValue::LINK_TYPE_INTERNAL,
                        'link' => 'value://42',
                    ],
                ],
                [
                    'use_link' => true,
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
                    'use_link' => true,
                    'link' => 42,
                ],
                [
                    'use_link' => true,
                    'link' => new LinkValue(),
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
        ];
    }

    protected function createBlockDefinitionHandler(): BlockDefinitionHandlerInterface
    {
        return new TitleHandler(
            [
                'h1' => 'Heading 1',
                'h2' => 'Heading 2',
            ],
            ['value'],
        );
    }
}
