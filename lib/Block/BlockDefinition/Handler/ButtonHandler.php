<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Block\BlockDefinition\Handler;

use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\Layouts\Parameters\ParameterBuilderInterface;
use Netgen\Layouts\Parameters\ParameterType;

use function array_flip;

final class ButtonHandler extends BlockDefinitionHandler
{
    /**
     * The list of styles for the button. Keys should be identifiers, while values
     * should be human readable names of the styles.
     *
     * @var array<string, string>
     */
    private array $styles;

    /**
     * List of value types allowed to be used in the link parameter.
     *
     * @var string[]
     */
    private array $valueTypes;

    /**
     * @param array<string, string> $styles
     * @param string[] $valueTypes
     */
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
            ],
        );

        $builder->add(
            'style',
            ParameterType\ChoiceType::class,
            [
                'required' => true,
                'options' => array_flip($this->styles),
            ],
        );

        $builder->add(
            'link',
            ParameterType\LinkType::class,
            [
                'value_types' => $this->valueTypes,
                'allow_invalid_internal' => true,
            ],
        );
    }
}
