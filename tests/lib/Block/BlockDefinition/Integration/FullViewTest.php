<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandlerInterface;
use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Twig\FullViewHandler;
use Netgen\Layouts\Tests\Block\BlockDefinition\Integration\BlockTest;

abstract class FullViewTest extends BlockTest
{
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

    protected function createBlockDefinitionHandler(): BlockDefinitionHandlerInterface
    {
        return new FullViewHandler(['content']);
    }
}
