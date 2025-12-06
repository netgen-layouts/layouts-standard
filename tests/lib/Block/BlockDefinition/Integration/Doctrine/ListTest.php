<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\ListHandler;
use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\ListTestBase;
use Netgen\Layouts\Tests\Persistence\Doctrine\TestCaseTrait;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ListHandler::class)]
final class ListTest extends ListTestBase
{
    use TestCaseTrait;
}
