<?php

namespace Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container;

use Netgen\BlockManager\Block\BlockDefinition\ContainerDefinitionHandler;

final class ThreeColumnsHandler extends ContainerDefinitionHandler
{
    public function getPlaceholderIdentifiers()
    {
        return ['left', 'center', 'right'];
    }
}
