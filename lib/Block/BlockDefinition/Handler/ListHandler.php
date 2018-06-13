<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Block\BlockDefinition\Handler;

use Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\BlockManager\Block\BlockDefinition\Handler\PagedCollectionsBlockInterface;
use Netgen\BlockManager\Parameters\ParameterBuilderInterface;
use Netgen\BlockManager\Parameters\ParameterType;

final class ListHandler extends BlockDefinitionHandler implements PagedCollectionsBlockInterface
{
    /**
     * @var array
     */
    private $columns = [];

    public function __construct(array $columns = [])
    {
        $this->columns = array_flip($columns);
    }

    public function buildParameters(ParameterBuilderInterface $builder)
    {
        $builder->add(
            'number_of_columns',
            ParameterType\ChoiceType::class,
            [
                'required' => true,
                'options' => $this->columns,
                'groups' => [self::GROUP_DESIGN],
            ]
        );
    }
}
