<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\BlockManager\Tests\Persistence\Doctrine\TestCaseTrait;
use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\TextTest as BaseTextTest;

/**
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\TextHandler::buildParameters
 */
final class TextTest extends BaseTextTest
{
    use TestCaseTrait;

    public function tearDown(): void
    {
        $this->closeDatabase();
    }
}
