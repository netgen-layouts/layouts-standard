<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\RichTextHandler;
use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\RichTextTestBase;
use Netgen\Layouts\Tests\Persistence\Doctrine\TestCaseTrait;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(RichTextHandler::class)]
final class RichTextTest extends RichTextTestBase
{
    use TestCaseTrait;
}
