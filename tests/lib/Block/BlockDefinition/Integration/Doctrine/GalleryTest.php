<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\BlockManager\Tests\Persistence\Doctrine\TestCaseTrait;
use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\GalleryTest as BaseGalleryTest;

/**
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\GalleryHandler::__construct
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\GalleryHandler::buildParameters
 */
final class GalleryTest extends BaseGalleryTest
{
    use TestCaseTrait;

    public function tearDown(): void
    {
        $this->closeDatabase();
    }
}
