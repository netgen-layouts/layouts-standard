<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\ListTest as BaseListTest;
use Netgen\Layouts\Tests\Persistence\Doctrine\TestCaseTrait;

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
