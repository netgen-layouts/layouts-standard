<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Block\BlockDefinition\Handler;

use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\BlockManager\Parameters\ParameterBuilderInterface;
use Netgen\BlockManager\Parameters\ParameterType;

final class MapHandler extends BlockDefinitionHandler
{
    /**
     * @var int
     */
    private $minZoom;

    /**
     * @var int
     */
    private $maxZoom;

    /**
     * The list of map types available. Keys should be identifiers, while values
     * should be human readable names of the map types.
     *
     * @var array
     */
    private $mapTypes;

    public function __construct(int $minZoom, int $maxZoom, array $mapTypes)
    {
        $this->minZoom = $minZoom;
        $this->maxZoom = $maxZoom;
        $this->mapTypes = $mapTypes;
    }

    public function buildParameters(ParameterBuilderInterface $builder): void
    {
        $builder->add(
            'latitude',
            ParameterType\NumberType::class,
            [
                'required' => true,
                'default_value' => 0,
                'groups' => [self::GROUP_CONTENT],
                'min' => -90,
                'max' => 90,
                'scale' => 6,
            ]
        );

        $builder->add(
            'longitude',
            ParameterType\NumberType::class,
            [
                'required' => true,
                'default_value' => 0,
                'groups' => [self::GROUP_CONTENT],
                'min' => -180,
                'max' => 180,
                'scale' => 6,
            ]
        );

        $builder->add(
            'zoom',
            ParameterType\RangeType::class,
            [
                'required' => true,
                'default_value' => 5,
                'groups' => [self::GROUP_DESIGN],
                'min' => $this->minZoom,
                'max' => $this->maxZoom,
            ]
        );

        $builder->add(
            'map_type',
            ParameterType\ChoiceType::class,
            [
                'required' => true,
                'groups' => [self::GROUP_DESIGN],
                'options' => array_flip($this->mapTypes),
            ]
        );

        $builder->add(
            'show_marker',
            ParameterType\BooleanType::class,
            [
                'default_value' => true,
                'groups' => [self::GROUP_DESIGN],
            ]
        );
    }
}
