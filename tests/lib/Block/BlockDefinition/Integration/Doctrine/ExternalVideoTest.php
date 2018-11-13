<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration\ExternalVideoTest as BaseExternalVideoTest;
use Netgen\BlockManager\Tests\Persistence\Doctrine\TestCaseTrait;

/**
 * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\ExternalVideoHandler::__construct
 * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\ExternalVideoHandler::buildParameters
 */
final class ExternalVideoTest extends BaseExternalVideoTest
{
    use TestCaseTrait;

    public function tearDown(): void
    {
        $this->closeDatabase();
    }
}
