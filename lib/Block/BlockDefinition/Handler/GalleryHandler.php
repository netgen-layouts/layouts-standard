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
    private $transitions = array();

    /**
     * @var array
     */
    private $aspectRatios = array();

    /**
     * @param int $minAutoplayTime
     * @param int $maxAutoplayTime
     * @param array $transitions
     * @param array $aspectRatios
     */
    public function __construct(
        $minAutoplayTime,
        $maxAutoplayTime,
        array $transitions = array(),
        array $aspectRatios = array()
    ) {
        $this->minAutoplayTime = $minAutoplayTime;
        $this->maxAutoplayTime = $maxAutoplayTime;
        $this->transitions = array_flip($transitions);
        $this->aspectRatios = array_flip($aspectRatios);
    }

    public function buildParameters(ParameterBuilderInterface $builder)
    {
        $builder->add(
            'next_and_previous',
            ParameterType\BooleanType::class,
            array(
                'groups' => array(self::GROUP_DESIGN),
            )
        );

        $builder->add(
            'show_pagination',
            ParameterType\BooleanType::class,
            array(
                'groups' => array(self::GROUP_DESIGN),
            )
        );

        $builder->add(
            'infinite_loop',
            ParameterType\BooleanType::class,
            array(
                'groups' => array(self::GROUP_DESIGN),
            )
        );

        $builder->add(
            'transition',
            ParameterType\ChoiceType::class,
            array(
                'required' => true,
                'options' => $this->transitions,
                'groups' => array(self::GROUP_DESIGN),
            )
        );

        $builder->add(
            'autoplay',
            ParameterType\Compound\BooleanType::class,
            array(
                'groups' => array(self::GROUP_DESIGN),
            )
        );

        $builder->get('autoplay')->add(
            'autoplay_time',
            ParameterType\RangeType::class,
            array(
                'required' => true,
                'min' => $this->minAutoplayTime,
                'max' => $this->maxAutoplayTime,
            )
        );

        $builder->add(
            'aspect_ratio',
            ParameterType\ChoiceType::class,
            array(
                'required' => true,
                'options' => $this->aspectRatios,
                'groups' => array(self::GROUP_DESIGN),
            )
        );

        $builder->add(
            'number_of_thumbnails',
            ParameterType\IntegerType::class,
            array(
                'required' => true,
                'min' => 1,
                'groups' => array(self::GROUP_DESIGN),
            )
        );

        $builder->add(
            'show_details',
            ParameterType\Compound\BooleanType::class,
            array(
                'groups' => array(self::GROUP_DESIGN),
            )
        );

        $builder->get('show_details')->add(
            'show_details_on_hover',
            ParameterType\BooleanType::class
        );

        $builder->add(
            'enable_lightbox',
            ParameterType\BooleanType::class,
            array(
                'groups' => array(self::GROUP_DESIGN),
            )
        );
    }
}
