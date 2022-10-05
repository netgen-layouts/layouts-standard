<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Block\BlockDefinition\Handler;

use Netgen\Layouts\API\Values\Block\Block;
use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\Layouts\Block\DynamicParameters;
use Netgen\Layouts\Parameters\ParameterBuilderInterface;
use Netgen\Layouts\Parameters\ParameterType;
use Netgen\Layouts\Standard\Utils\Markdown;

final class MarkdownHandler extends BlockDefinitionHandler
{
    private Markdown $markdownParser;

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
        $params['html'] = fn (): string => $this->markdownParser->parse(
            $block->getParameter('content')->getValue() ?? '',
        );
    }
}
