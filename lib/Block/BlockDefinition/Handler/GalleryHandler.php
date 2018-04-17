<?php

namespace Netgen\BlockManager\Standard\Block\BlockDefinition\Handler;

use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\BlockManager\Parameters\ParameterBuilderInterface;
use Netgen\BlockManager\Parameters\ParameterType;

final class GalleryHandler extends BlockDefinitionHandler
{
    /**
     * @var int
     */
    private $minAutoplayTime;

    /**
     * @var int
     */
    private $maxAutoplayTime;

    /**
     * @var array
     */
    private $transitions = [];

    /**
     * @param int $minAutoplayTime
     * @param int $maxAutoplayTime
     * @param array $transitions
     */
    public function __construct(
        $minAutoplayTime,
        $maxAutoplayTime,
        array $transitions = []
    ) {
        $this->minAutoplayTime = $minAutoplayTime;
        $this->maxAutoplayTime = $maxAutoplayTime;
        $this->transitions = array_flip($transitions);
    }

    public function buildParameters(ParameterBuilderInterface $builder)
    {
        $builder->add(
            'next_and_previous',
            ParameterType\BooleanType::class,
            [
                'groups' => [self::GROUP_DESIGN],
            ]
        );

        $builder->add(
            'show_pagination',
            ParameterType\BooleanType::class,
            [
                'groups' => [self::GROUP_DESIGN],
            ]
        );

        $builder->add(
            'infinite_loop',
            ParameterType\BooleanType::class,
            [
                'groups' => [self::GROUP_DESIGN],
            ]
        );

        $builder->add(
            'transition',
            ParameterType\ChoiceType::class,
            [
                'required' => true,
                'options' => $this->transitions,
                'groups' => [self::GROUP_DESIGN],
            ]
        );

        $builder->add(
            'autoplay',
            ParameterType\Compound\BooleanType::class,
            [
                'groups' => [self::GROUP_DESIGN],
            ]
        );

        $builder->get('autoplay')->add(
            'autoplay_time',
            ParameterType\RangeType::class,
            [
                'required' => true,
                'min' => $this->minAutoplayTime,
                'max' => $this->maxAutoplayTime,
            ]
        );

        $builder->add(
            'number_of_thumbnails',
            ParameterType\IntegerType::class,
            [
                'required' => true,
                'min' => 1,
                'groups' => [self::GROUP_DESIGN],
            ]
        );

        $builder->add(
            'show_details',
            ParameterType\Compound\BooleanType::class,
            [
                'groups' => [self::GROUP_DESIGN],
            ]
        );

        $builder->get('show_details')->add(
            'show_details_on_hover',
            ParameterType\BooleanType::class
        );

        $builder->add(
            'enable_lightbox',
            ParameterType\BooleanType::class,
            [
                'groups' => [self::GROUP_DESIGN],
            ]
        );
    }
}
