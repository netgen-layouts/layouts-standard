<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\MarkdownHandler;
use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\MarkdownTestBase;
use Netgen\Layouts\Tests\Persistence\Doctrine\TestCaseTrait;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(MarkdownHandler::class)]
final class MarkdownTest extends MarkdownTestBase
{
    use TestCaseTrait;
}
