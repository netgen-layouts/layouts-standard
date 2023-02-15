<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\MarkdownTestBase;
use Netgen\Layouts\Tests\Persistence\Doctrine\TestCaseTrait;

/**
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\MarkdownHandler::buildParameters
 */
final class MarkdownTest extends MarkdownTestBase
{
    use TestCaseTrait;

    protected function tearDown(): void
    {
        $this->closeDatabase();
    }
}
