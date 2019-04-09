<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Block\BlockDefinition\Handler;

use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\BlockManager\Parameters\ParameterBuilderInterface;
use Netgen\BlockManager\Parameters\ParameterType;

final class ExternalVideoHandler extends BlockDefinitionHandler
{
    /**
     * The list of video services available. Keys should be identifiers, while values
     * should be human readable names of the services.
     *
     * @var array
     */
    private $services;

    public function __construct(array $services)
    {
        $this->services = $services;
    }

    public function buildParameters(ParameterBuilderInterface $builder): void
    {
        $builder->add(
            'service',
            ParameterType\ChoiceType::class,
            [
                'required' => true,
                'options' => array_flip($this->services),
            ]
        );

        $builder->add('video_id', ParameterType\TextLineType::class);
        $builder->add('caption', ParameterType\TextLineType::class);
    }
}
