<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\BlockManager\Parameters\Value\LinkValue;
use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\TitleHandler;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;

abstract class TitleTest extends BlockTest
{
    public function createBlockDefinitionHandler(): BlockDefinitionHandlerInterface
    {
        return new TitleHandler(
            [
                'h1' => 'Heading 1',
                'h2' => 'Heading 2',
            ],
            ['value']
        );
    }

    public function parametersDataProvider(): array
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

    public function invalidParametersDataProvider(): array
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
