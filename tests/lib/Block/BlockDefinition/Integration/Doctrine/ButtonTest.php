<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\BlockManager\Tests\Persistence\Doctrine\TestCaseTrait;
use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\ButtonTest as BaseButtonTest;

/**
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\ButtonHandler::__construct
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\ButtonHandler::buildParameters
 */
final class ButtonTest extends BaseButtonTest
{
    use TestCaseTrait;

    public function tearDown(): void
    {
        $this->closeDatabase();
    }
}
