<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Block\BlockDefinition\Handler;

use Netgen\BlockManager\API\Values\Block\Block;
use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\BlockManager\Block\DynamicParameters;
use Netgen\BlockManager\Parameters\ParameterBuilderInterface;
use Netgen\BlockManager\Parameters\ParameterType;
use Netgen\Layouts\Standard\Utils\Markdown;

final class MarkdownHandler extends BlockDefinitionHandler
{
    /**
     * @var \Netgen\Layouts\Standard\Utils\Markdown
     */
    private $markdownParser;

    public function __construct(Markdown $markdownParser)
    {
        $this->markdownParser = $markdownParser;
    }

    public function buildParameters(ParameterBuilderInterface $builder): void
    {
        $builder->add('content', ParameterType\TextType::class);
    }

    public function getDynamicParameters(DynamicParameters $params, Block $block): void
    {
        $params['html'] = function () use ($block): string {
            return $this->markdownParser->parse(
                $block->getParameter('content')->getValue()
            );
        };
    }
}
