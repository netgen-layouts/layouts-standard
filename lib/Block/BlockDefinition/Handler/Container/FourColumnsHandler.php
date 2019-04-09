<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Container;

use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\BlockManager\Block\BlockDefinition\ContainerDefinitionHandlerInterface;

final class FourColumnsHandler extends BlockDefinitionHandler implements ContainerDefinitionHandlerInterface
{
    public function getPlaceholderIdentifiers(): array
    {
        return ['left', 'center_left', 'center_right', 'right'];
    }
}
