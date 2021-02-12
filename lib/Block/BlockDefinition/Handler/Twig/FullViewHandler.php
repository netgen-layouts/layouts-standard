<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Twig;

use Netgen\Layouts\API\Values\Block\Block;
use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\Layouts\Block\BlockDefinition\TwigBlockDefinitionHandlerInterface;

/**
 * Block used to render the full view (or rather, the result of the controller).
 *
 * The default block names to use & render are provided by the constructor.
 */
final class FullViewHandler extends BlockDefinitionHandler implements TwigBlockDefinitionHandlerInterface
{
    /**
     * @var string[]
     */
    private array $twigBlockNames;

    /**
     * @param string[] $twigBlockNames
     */
    public function __construct(array $twigBlockNames)
    {
        $this->twigBlockNames = $twigBlockNames;
    }

    public function isContextual(Block $block): bool
    {
        return true;
    }

    public function getTwigBlockNames(Block $block): array
    {
        return $this->twigBlockNames;
    }
}
