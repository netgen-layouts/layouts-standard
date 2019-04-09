<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\BlockManager\Tests\Persistence\Doctrine\TestCaseTrait;
use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\MapTest as BaseMapTest;

/**
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\MapHandler::__construct
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\MapHandler::buildParameters
 */
final class MapTest extends BaseMapTest
{
    use TestCaseTrait;

    public function tearDown(): void
    {
        $this->closeDatabase();
    }
}
