<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\ButtonTest as BaseButtonTest;
use Netgen\Layouts\Tests\Persistence\Doctrine\TestCaseTrait;

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
