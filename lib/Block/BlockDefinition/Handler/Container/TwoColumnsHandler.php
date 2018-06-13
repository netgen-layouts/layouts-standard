<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container;

use Netgen\BlockManager\Block\BlockDefinition\ContainerDefinitionHandler;

final class TwoColumnsHandler extends ContainerDefinitionHandler
{
    public function getPlaceholderIdentifiers()
    {
        return ['left', 'right'];
    }
}
