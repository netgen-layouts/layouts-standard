<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Block\BlockDefinition\Handler;

use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\Layouts\Parameters\ParameterBuilderInterface;
use Netgen\Layouts\Parameters\ParameterType;

use function array_flip;

final class GalleryHandler extends BlockDefinitionHandler
{
    private int $minAutoplayTime;

    private int $maxAutoplayTime;

    /**
     * The list of gallery transitions. Keys should be identifiers, while values
     * should be human readable names of the transitions.
     *
     * @var array<string, string>
     */
    private array $transitions;

    /**
     * @param array<string, string> $transitions
     */
    public function __construct(
        int $minAutoplayTime,
        int $maxAutoplayTime,
        array $transitions
    ) {
        $this->minAutoplayTime = $minAutoplayTime;
        $this->maxAutoplayTime = $maxAutoplayTime;
        $this->transitions = $transitions;
    }

    public function buildParameters(ParameterBuilderInterface $builder): void
    {
        $builder->add(
            'next_and_previous',
            ParameterType\BooleanType::class,
            [
                'groups' => [self::GROUP_DESIGN],
            ],
        );

        $builder->add(
            'show_pagination',
            ParameterType\BooleanType::class,
            [
                'groups' => [self::GROUP_DESIGN],
            ],
        );

        $builder->add(
            'infinite_loop',
            ParameterType\BooleanType::class,
            [
                'groups' => [self::GROUP_DESIGN],
            ],
        );

        $builder->add(
            'transition',
            ParameterType\ChoiceType::class,
            [
                'required' => true,
                'options' => array_flip($this->transitions),
                'groups' => [self::GROUP_DESIGN],
            ],
        );

        $builder->add(
            'autoplay',
            ParameterType\Compound\BooleanType::class,
            [
                'groups' => [self::GROUP_DESIGN],
            ],
        );

        $builder->get('autoplay')->add(
            'autoplay_time',
            ParameterType\RangeType::class,
            [
                'required' => true,
                'min' => $this->minAutoplayTime,
                'max' => $this->maxAutoplayTime,
            ],
        );

        $builder->add(
            'number_of_thumbnails',
            ParameterType\IntegerType::class,
            [
                'required' => true,
                'min' => 1,
                'groups' => [self::GROUP_DESIGN],
            ],
        );

        $builder->add(
            'thumbnails_to_move',
            ParameterType\IntegerType::class,
            [
                'min' => 1,
                'groups' => [self::GROUP_DESIGN],
            ],
        );

        $builder->add(
            'show_details',
            ParameterType\Compound\BooleanType::class,
            [
                'groups' => [self::GROUP_DESIGN],
            ],
        );

        $builder->get('show_details')->add(
            'show_details_on_hover',
            ParameterType\BooleanType::class,
        );

        $builder->add(
            'enable_lightbox',
            ParameterType\BooleanType::class,
            [
                'groups' => [self::GROUP_DESIGN],
            ],
        );
    }
}
