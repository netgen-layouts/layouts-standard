<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Block\BlockDefinition\Handler;

use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\BlockManager\Parameters\ParameterBuilderInterface;
use Netgen\BlockManager\Parameters\ParameterType;

final class TextHandler extends BlockDefinitionHandler
{
    public function buildParameters(ParameterBuilderInterface $builder): void
    {
        $builder->add(
            'content',
            ParameterType\TextType::class,
            [
                'required' => true,
                'default_value' => 'Text',
            ]
        );
    }
}
