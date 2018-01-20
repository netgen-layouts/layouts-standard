<?php

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration\ListTest as BaseListTest;
use Netgen\BlockManager\Tests\Persistence\Doctrine\TestCaseTrait;

/**
 * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\ListHandler::__construct
 * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\ListHandler::buildParameters
 */
final class ListTest extends BaseListTest
{
    use TestCaseTrait;

    public function tearDown()
    {
        $this->closeDatabase();
    }

    /**
     * Prepares the persistence handler used in tests.
     */
    public function preparePersistence()
    {
        $this->persistenceHandler = $this->createPersistenceHandler();
    }
}
