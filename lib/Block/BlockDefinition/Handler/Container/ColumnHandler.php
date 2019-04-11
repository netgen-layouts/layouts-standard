<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Container;

use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\Layouts\Block\BlockDefinition\ContainerDefinitionHandlerInterface;

final class ColumnHandler extends BlockDefinitionHandler implements ContainerDefinitionHandlerInterface
{
    public function getPlaceholderIdentifiers(): array
    {
        return ['main'];
    }
}
