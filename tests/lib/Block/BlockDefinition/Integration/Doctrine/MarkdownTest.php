<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\BlockManager\Tests\Persistence\Doctrine\TestCaseTrait;
use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\MarkdownTest as BaseMarkdownTest;

/**
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\MarkdownHandler::buildParameters
 */
final class MarkdownTest extends BaseMarkdownTest
{
    use TestCaseTrait;

    public function tearDown(): void
    {
        $this->closeDatabase();
    }
}
