<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Block\BlockDefinition\Handler;

use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\BlockManager\Parameters\ParameterBuilderInterface;
use Netgen\BlockManager\Parameters\ParameterType;

final class ExternalVideoHandler extends BlockDefinitionHandler
{
    /**
     * @var array
     */
    private $services = [];

    public function __construct(array $services = [])
    {
        $this->services = array_flip($services);
    }

    public function buildParameters(ParameterBuilderInterface $builder)
    {
        $builder->add(
            'service',
            ParameterType\ChoiceType::class,
            [
                'required' => true,
                'options' => $this->services,
            ]
        );

        $builder->add(
            'video_id',
            ParameterType\TextLineType::class
        );

        $builder->add(
            'caption',
            ParameterType\TextLineType::class
        );
    }
}
