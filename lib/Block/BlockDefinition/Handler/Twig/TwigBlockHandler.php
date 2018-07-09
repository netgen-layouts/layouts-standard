<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Twig;

use Netgen\BlockManager\API\Values\Block\Block;
use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\BlockManager\Block\BlockDefinition\TwigBlockDefinitionHandlerInterface;
use Netgen\BlockManager\Parameters\ParameterBuilderInterface;
use Netgen\BlockManager\Parameters\ParameterType;

/**
 * Block used to render a Twig template block with a name provided
 * through the block parameter.
 */
final class TwigBlockHandler extends BlockDefinitionHandler implements TwigBlockDefinitionHandlerInterface
{
    public function buildParameters(ParameterBuilderInterface $builder): void
    {
        $builder->add('block_name', ParameterType\IdentifierType::class);
    }

    public function isContextual(Block $block): bool
    {
        return true;
    }

    public function getTwigBlockName(Block $block): string
    {
        return $block->getParameter('block_name')->getValue();
    }
}
