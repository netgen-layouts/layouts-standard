<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Block\BlockDefinition\Handler;

use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\BlockManager\Parameters\ParameterBuilderInterface;
use Netgen\BlockManager\Parameters\ParameterType;

final class TitleHandler extends BlockDefinitionHandler
{
    /**
     * @var array
     */
    private $tags = [];

    /**
     * @var array
     */
    private $linkValueTypes = [];

    public function __construct(array $tags = [], array $linkValueTypes = [])
    {
        $this->tags = array_flip($tags);
        $this->linkValueTypes = $linkValueTypes;
    }

    public function buildParameters(ParameterBuilderInterface $builder)
    {
        $builder->add(
            'tag',
            ParameterType\ChoiceType::class,
            [
                'required' => true,
                'options' => $this->tags,
            ]
        );

        $builder->add(
            'title',
            ParameterType\TextLineType::class,
            [
                'required' => true,
                'default_value' => 'Title',
            ]
        );

        $builder->add(
            'use_link',
            ParameterType\Compound\BooleanType::class
        );

        $builder->get('use_link')->add(
            'link',
            ParameterType\LinkType::class,
            [
                'value_types' => $this->linkValueTypes,
                'allow_invalid_internal' => true,
            ]
        );
    }
}
