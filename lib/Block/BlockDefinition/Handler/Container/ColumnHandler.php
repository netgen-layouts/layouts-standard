<?php

namespace Netgen\BlockManager\Block\BlockDefinition\Handler\Container;

use Netgen\BlockManager\Block\BlockDefinition\ContainerDefinitionHandler;

final class ColumnHandler extends ContainerDefinitionHandler
{
    public function getPlaceholderIdentifiers()
    {
        return array('main');
    }
}
