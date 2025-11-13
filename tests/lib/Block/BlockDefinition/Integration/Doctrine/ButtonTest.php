<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\ButtonHandler;
use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\ButtonTestBase;
use Netgen\Layouts\Tests\Persistence\Doctrine\TestCaseTrait;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ButtonHandler::class)]
final class ButtonTest extends ButtonTestBase
{
    use TestCaseTrait;

    protected function tearDown(): void
    {
        $this->closeDatabase();
    }
}
