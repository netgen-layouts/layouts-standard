<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Block\BlockDefinition\Handler;

use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\Layouts\Parameters\ParameterBuilderInterface;
use Netgen\Layouts\Parameters\ParameterType;

final class RichTextHandler extends BlockDefinitionHandler
{
    public function buildParameters(ParameterBuilderInterface $builder): void
    {
        $builder->add(
            'content',
            ParameterType\HtmlType::class,
            [
                'required' => true,
                'default_value' => 'Text',
            ],
        );
    }
}
