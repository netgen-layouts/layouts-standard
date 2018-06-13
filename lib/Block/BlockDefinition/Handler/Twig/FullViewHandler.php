<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\Twig;

use Netgen\BlockManager\API\Values\Block\Block;
use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\BlockManager\Block\BlockDefinition\TwigBlockDefinitionHandlerInterface;

/**
 * Block used to render the full view (or rather, the result of the controller).
 *
 * The default block name to use & render is provided by the constructor.
 */
final class FullViewHandler extends BlockDefinitionHandler implements TwigBlockDefinitionHandlerInterface
{
    /**
     * @var string
     */
    private $twigBlockName;

    public function __construct(string $twigBlockName)
    {
        $this->twigBlockName = $twigBlockName;
    }

    public function isContextual(Block $block): bool
    {
        return true;
    }

    public function getTwigBlockName(Block $block): string
    {
        return $this->twigBlockName;
    }
}
