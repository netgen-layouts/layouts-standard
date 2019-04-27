<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\GalleryTest as BaseGalleryTest;
use Netgen\Layouts\Tests\Persistence\Doctrine\TestCaseTrait;

/**
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\GalleryHandler::__construct
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\GalleryHandler::buildParameters
 */
final class GalleryTest extends BaseGalleryTest
{
    use TestCaseTrait;

    protected function tearDown(): void
    {
        $this->closeDatabase();
    }
}
