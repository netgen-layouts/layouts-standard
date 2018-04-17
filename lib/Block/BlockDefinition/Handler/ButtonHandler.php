<?php

namespace Netgen\BlockManager\Standard\Block\BlockDefinition\Handler;

use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\BlockManager\Parameters\ParameterBuilderInterface;
use Netgen\BlockManager\Parameters\ParameterType;

final class ButtonHandler extends BlockDefinitionHandler
{
    /**
     * @var array
     */
    private $styles = [];

    /**
     * @var array
     */
    private $valueTypes = [];

    public function __construct(array $styles = [], array $valueTypes = [])
    {
        $this->styles = array_flip($styles);
        $this->valueTypes = $valueTypes;
    }

    public function buildParameters(ParameterBuilderInterface $builder)
    {
        $builder->add(
            'text',
            ParameterType\TextLineType::class,
            [
                'required' => true,
                'default_value' => 'Text',
            ]
        );

        $builder->add(
            'style',
            ParameterType\ChoiceType::class,
            [
                'required' => true,
                'options' => $this->styles,
            ]
        );

        $builder->add(
            'link',
            ParameterType\LinkType::class,
            [
                'value_types' => $this->valueTypes,
                'allow_invalid_internal' => true,
            ]
        );
    }
}
