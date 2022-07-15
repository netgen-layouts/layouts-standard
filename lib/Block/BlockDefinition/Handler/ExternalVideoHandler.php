<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Block\BlockDefinition\Handler;

use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\Layouts\Parameters\ParameterBuilderInterface;
use Netgen\Layouts\Parameters\ParameterType;

use function array_flip;

final class ExternalVideoHandler extends BlockDefinitionHandler
{
    /**
     * The list of video services available. Keys should be identifiers, while values
     * should be human readable names of the services.
     *
     * @var array<string, string>
     */
    private array $services;

    /**
     * @param array<string, string> $services
     */
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
            ],
        );

        $builder->add('video_id', ParameterType\TextLineType::class);
        $builder->add('caption', ParameterType\TextLineType::class);
    }
}
