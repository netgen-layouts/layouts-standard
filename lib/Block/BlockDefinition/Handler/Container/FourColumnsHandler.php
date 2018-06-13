<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Container;

use Netgen\BlockManager\Block\BlockDefinition\ContainerDefinitionHandler;

final class FourColumnsHandler extends ContainerDefinitionHandler
{
    public function getPlaceholderIdentifiers()
    {
        return ['left', 'center_left', 'center_right', 'right'];
    }
}
