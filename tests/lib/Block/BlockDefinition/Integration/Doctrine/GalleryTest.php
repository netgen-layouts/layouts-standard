<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration\GalleryTest as BaseGalleryTest;
use Netgen\BlockManager\Tests\Persistence\Doctrine\TestCaseTrait;

/**
 * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\GalleryHandler::__construct
 * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\GalleryHandler::buildParameters
 */
final class GalleryTest extends BaseGalleryTest
{
    use TestCaseTrait;

    public function tearDown(): void
    {
        $this->closeDatabase();
    }
}
