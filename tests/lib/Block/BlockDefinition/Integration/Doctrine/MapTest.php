<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\MapHandler;
use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\MapTestBase;
use Netgen\Layouts\Tests\Persistence\Doctrine\TestCaseTrait;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(MapHandler::class)]
final class MapTest extends MapTestBase
{
    use TestCaseTrait;

    protected function tearDown(): void
    {
        $this->closeDatabase();
    }
}
