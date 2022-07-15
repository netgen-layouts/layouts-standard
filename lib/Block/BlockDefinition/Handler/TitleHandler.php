<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Block\BlockDefinition\Handler;

use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\Layouts\Parameters\ParameterBuilderInterface;
use Netgen\Layouts\Parameters\ParameterType;

use function array_flip;

final class TitleHandler extends BlockDefinitionHandler
{
    /**
     * The list of HTML tags available for the link. Keys should be identifiers, while values
     * should be human readable names of the HTML tags.
     *
     * @var array<string, string>
     */
    private array $tags;

    /**
     * List of value types allowed to be used in the link parameter.
     *
     * @var string[]
     */
    private array $linkValueTypes;

    /**
     * @param array<string, string> $tags
     * @param string[] $linkValueTypes
     */
    public function __construct(array $tags, array $linkValueTypes)
    {
        $this->tags = $tags;
        $this->linkValueTypes = $linkValueTypes;
    }

    public function buildParameters(ParameterBuilderInterface $builder): void
    {
        $builder->add(
            'tag',
            ParameterType\ChoiceType::class,
            [
                'required' => true,
                'options' => array_flip($this->tags),
            ],
        );

        $builder->add(
            'title',
            ParameterType\TextLineType::class,
            [
                'required' => true,
                'default_value' => 'Title',
            ],
        );

        $builder->add(
            'use_link',
            ParameterType\Compound\BooleanType::class,
        );

        $builder->get('use_link')->add(
            'link',
            ParameterType\LinkType::class,
            [
                'value_types' => $this->linkValueTypes,
                'allow_invalid_internal' => true,
            ],
        );
    }
}
