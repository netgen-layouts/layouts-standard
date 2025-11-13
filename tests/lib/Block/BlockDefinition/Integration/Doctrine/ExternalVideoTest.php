<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\ExternalVideoHandler;
use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\ExternalVideoTestBase;
use Netgen\Layouts\Tests\Persistence\Doctrine\TestCaseTrait;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ExternalVideoHandler::class)]
final class ExternalVideoTest extends ExternalVideoTestBase
{
    use TestCaseTrait;

    protected function tearDown(): void
    {
        $this->closeDatabase();
    }
}
