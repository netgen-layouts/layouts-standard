<?php

namespace Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container;

use Netgen\BlockManager\Block\BlockDefinition\ContainerDefinitionHandler;

final class ColumnHandler extends ContainerDefinitionHandler
{
    public function getPlaceholderIdentifiers()
    {
        return ['main'];
    }
}
