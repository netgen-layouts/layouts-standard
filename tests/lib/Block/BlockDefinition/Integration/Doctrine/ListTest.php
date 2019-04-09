<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\BlockManager\Tests\Persistence\Doctrine\TestCaseTrait;
use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\ListTest as BaseListTest;

/**
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\ListHandler::__construct
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\ListHandler::buildParameters
 */
final class ListTest extends BaseListTest
{
    use TestCaseTrait;

    public function tearDown(): void
    {
        $this->closeDatabase();
    }
}
