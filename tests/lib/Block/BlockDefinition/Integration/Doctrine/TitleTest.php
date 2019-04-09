<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\BlockManager\Tests\Persistence\Doctrine\TestCaseTrait;
use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\TitleTest as BaseTitleTest;

/**
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\TitleHandler::__construct
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\TitleHandler::buildParameters
 */
final class TitleTest extends BaseTitleTest
{
    use TestCaseTrait;

    public function tearDown(): void
    {
        $this->closeDatabase();
    }
}
