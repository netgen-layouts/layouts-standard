<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container;

use Netgen\BlockManager\Block\BlockDefinition\ContainerDefinitionHandler;

final class ThreeColumnsHandler extends ContainerDefinitionHandler
{
    public function getPlaceholderIdentifiers(): array
    {
        return ['left', 'center', 'right'];
    }
}
