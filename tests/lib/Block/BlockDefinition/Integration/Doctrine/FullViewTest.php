<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\BlockManager\Tests\Persistence\Doctrine\TestCaseTrait;
use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\FullViewTest as BaseFullViewTest;

/**
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Twig\FullViewHandler::buildParameters
 */
final class FullViewTest extends BaseFullViewTest
{
    use TestCaseTrait;

    public function tearDown(): void
    {
        $this->closeDatabase();
    }
}
