<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\BlockManager\Tests\Persistence\Doctrine\TestCaseTrait;
use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\TwigBlockTest as BaseTwigBlockTest;

/**
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Twig\TwigBlockHandler::buildParameters
 */
final class TwigBlockTest extends BaseTwigBlockTest
{
    use TestCaseTrait;

    public function tearDown(): void
    {
        $this->closeDatabase();
    }
}
