<?php

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration;

use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\ListHandler;
use Netgen\BlockManager\Tests\Block\BlockDefinition\Integration\BlockTest;

abstract class ListTest extends BlockTest
{
    /**
     * @return \Netgen\BlockManager\Block\BlockDefinition\BlockDefinitionHandlerInterface
     */
    public function createBlockDefinitionHandler()
    {
        return new ListHandler(
            array(
                2 => '2 columns',
                3 => '3 columns',
            )
        );
    }

    /**
     * @return bool
     */
    public function hasCollection()
    {
        return true;
    }

    /**
     * @return array
     */
    public function parametersDataProvider()
    {
        return array(
            array(
                array(),
                array(
                    'number_of_columns' => 2,
                ),
            ),
            array(
                array(
                    'number_of_columns' => 3,
                ),
                array(
                    'number_of_columns' => 3,
                ),
            ),
            array(
                array(
                    'unknown' => 'unknown',
                ),
                array(),
            ),
        );
    }

    /**
     * @return array
     */
    public function invalidParametersDataProvider()
    {
        return array(
            array(
                array(
                    'number_of_columns' => null,
                ),
            ),
            array(
                array(
                    'number_of_columns' => '2',
                ),
            ),
        );
    }
}
