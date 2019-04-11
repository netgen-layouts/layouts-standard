<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Block\BlockDefinition\Handler;

use Netgen\Layouts\Block\BlockDefinition\BlockDefinitionHandler;
use Netgen\Layouts\Block\BlockDefinition\Handler\PagedCollectionsBlockInterface;
use Netgen\Layouts\Parameters\ParameterBuilderInterface;
use Netgen\Layouts\Parameters\ParameterType;

final class ListHandler extends BlockDefinitionHandler implements PagedCollectionsBlockInterface
{
    /**
     * The list of columns available. Keys should be identifiers, while values
     * should be human readable names of the columns.
     *
     * @var array
     */
    private $columns;

    public function __construct(array $columns)
    {
        $this->columns = $columns;
    }

    public function buildParameters(ParameterBuilderInterface $builder): void
    {
        $builder->add(
            'number_of_columns',
            ParameterType\ChoiceType::class,
            [
                'required' => true,
                'options' => array_flip($this->columns),
                'groups' => [self::GROUP_DESIGN],
            ]
        );
    }
}
