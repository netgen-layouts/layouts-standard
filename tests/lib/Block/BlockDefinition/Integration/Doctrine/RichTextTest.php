<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\BlockManager\Tests\Persistence\Doctrine\TestCaseTrait;
use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\RichTextTest as BaseRichTextTest;

/**
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\RichTextHandler::buildParameters
 */
final class RichTextTest extends BaseRichTextTest
{
    use TestCaseTrait;

    public function tearDown(): void
    {
        $this->closeDatabase();
    }
}
