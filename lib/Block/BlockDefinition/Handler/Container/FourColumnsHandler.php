<?php

namespace Netgen\BlockManager\Block\BlockDefinition\Handler\Container;

use Netgen\BlockManager\Block\BlockDefinition\ContainerDefinitionHandler;

final class FourColumnsHandler extends ContainerDefinitionHandler
{
    public function getPlaceholderIdentifiers()
    {
        return array('left', 'center_left', 'center_right', 'right');
    }
}
