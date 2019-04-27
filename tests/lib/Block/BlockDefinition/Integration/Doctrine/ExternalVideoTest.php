<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\ExternalVideoTest as BaseExternalVideoTest;
use Netgen\Layouts\Tests\Persistence\Doctrine\TestCaseTrait;

/**
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\ExternalVideoHandler::__construct
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\ExternalVideoHandler::buildParameters
 */
final class ExternalVideoTest extends BaseExternalVideoTest
{
    use TestCaseTrait;

    protected function tearDown(): void
    {
        $this->closeDatabase();
    }
}
