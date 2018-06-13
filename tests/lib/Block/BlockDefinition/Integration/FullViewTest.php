<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Twig\FullViewHandler;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;

abstract class FullViewTest extends BlockTest
{
    public function createBlockDefinitionHandler(): BlockDefinitionHandlerInterface
    {
        return new FullViewHandler('content');
    }

    public function parametersDataProvider(): array
    {
        return [
            [
                [],
                [],
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
                [],
            ],
        ];
    }
}
