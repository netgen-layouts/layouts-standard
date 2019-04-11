<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\MarkdownHandler;
use Netgen\Layouts\Standard\Utils\Markdown;
use Netgen\Layouts\Tests\Block\BlockDefinition\Integration\BlockTest;
use Netgen\Layouts\Utils\HtmlPurifier;

abstract class MarkdownTest extends BlockTest
{
    public function parametersDataProvider(): array
    {
        return [
            [
                [],
                [
                    'content' => null,
                ],
            ],
            [
                [
                    'content' => null,
                ],
                [
                    'content' => null,
                ],
            ],
            [
                [
                    'content' => '',
                ],
                [
                    'content' => '',
                ],
            ],
            [
                [
                    'content' => '* Text',
                ],
                [
                    'content' => '* Text',
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
                    'content' => 42,
                ],
            ],
        ];
    }

    protected function createBlockDefinitionHandler(): BlockDefinitionHandlerInterface
    {
        return new MarkdownHandler(new Markdown(new HtmlPurifier()));
    }
}
