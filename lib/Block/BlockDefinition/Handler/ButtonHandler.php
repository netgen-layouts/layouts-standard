<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Block\BlockDefinition\Handler;

use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\BlockManager\Parameters\ParameterBuilderInterface;
use Netgen\BlockManager\Parameters\ParameterType;

final class ButtonHandler extends BlockDefinitionHandler
{
    /**
     * The list of styles for the button. Keys should be identifiers, while values
     * should be human readable names of the styles.
     *
     * @var array
     */
    private $styles;

    /**
     * List of value types allowed to be used in the link parameter.
     *
     * @var array
     */
    private $valueTypes;

    public function __construct(array $styles, array $valueTypes)
    {
        $this->styles = $styles;
        $this->valueTypes = $valueTypes;
    }

    public function buildParameters(ParameterBuilderInterface $builder): void
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
                'options' => array_flip($this->styles),
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
