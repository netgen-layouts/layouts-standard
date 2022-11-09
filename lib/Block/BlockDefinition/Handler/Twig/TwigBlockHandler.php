<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Twig;

use Netgen\Layouts\API\Values\Block\Block;
use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\Layouts\Block\BlockDefinition\TwigBlockDefinitionHandlerInterface;
use Netgen\Layouts\Parameters\ParameterBuilderInterface;
use Netgen\Layouts\Parameters\ParameterType;

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

    public function getTwigBlockNames(Block $block): array
    {
        return [$block->getParameter('block_name')->getValue() ?? ''];
    }
}
