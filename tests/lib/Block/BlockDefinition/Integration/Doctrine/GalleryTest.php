<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\GalleryHandler;
use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\GalleryTestBase;
use Netgen\Layouts\Tests\Persistence\Doctrine\TestCaseTrait;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(GalleryHandler::class)]
final class GalleryTest extends GalleryTestBase
{
    use TestCaseTrait;

    protected function tearDown(): void
    {
        $this->closeDatabase();
    }
}
