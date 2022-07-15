<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Block\BlockDefinition\Handler;

use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\Layouts\Parameters\ParameterBuilderInterface;
use Netgen\Layouts\Parameters\ParameterType;

use function array_flip;

final class MapHandler extends BlockDefinitionHandler
{
    private int $minZoom;

    private int $maxZoom;

    /**
     * The list of map types available. Keys should be identifiers, while values
     * should be human readable names of the map types.
     *
     * @var array<string, string>
     */
    private array $mapTypes;

    /**
     * @param array<string, string> $mapTypes
     */
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
                'min' => -90,
                'max' => 90,
                'scale' => 6,
            ],
        );

        $builder->add(
            'longitude',
            ParameterType\NumberType::class,
            [
                'required' => true,
                'default_value' => 0,
                'min' => -180,
                'max' => 180,
                'scale' => 6,
            ],
        );

        $builder->add(
            'zoom',
            ParameterType\RangeType::class,
            [
                'required' => true,
                'default_value' => 5,
                'min' => $this->minZoom,
                'max' => $this->maxZoom,
            ],
        );

        $builder->add(
            'map_type',
            ParameterType\ChoiceType::class,
            [
                'required' => true,
                'options' => array_flip($this->mapTypes),
            ],
        );

        $builder->add(
            'show_marker',
            ParameterType\BooleanType::class,
            [
                'default_value' => true,
            ],
        );
    }
}
