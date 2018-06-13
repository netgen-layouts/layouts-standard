<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration\TitleTest as BaseTitleTest;
use Netgen\BlockManager\Tests\Persistence\Doctrine\TestCaseTrait;

/**
 * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\TitleHandler::__construct
 * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\TitleHandler::buildParameters
 */
final class TitleTest extends BaseTitleTest
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
