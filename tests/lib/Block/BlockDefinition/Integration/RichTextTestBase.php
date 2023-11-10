<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\RichTextHandler;
use Netgen\Layouts\Tests\Block\BlockDefinition\Integration\BlockTestCase;

abstract class RichTextTestBase extends BlockTestCase
{
    public static function parametersDataProvider(): iterable
    {
        return [
            [
                [],
                [
                    'content' => 'Text',
                ],
            ],
            [
                [
                    'content' => '<b>Text</b>',
                ],
                [
                    'content' => '<b>Text</b>',
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
                    'content' => null,
                ],
            ],
            [
                [
                    'content' => '',
                ],
            ],
            [
                [
                    'content' => 42,
                ],
            ],
        ];
    }

    protected function createBlockDefinitionHandler(): BlockDefinitionHandlerInterface
    {
        return new RichTextHandler();
    }
}
