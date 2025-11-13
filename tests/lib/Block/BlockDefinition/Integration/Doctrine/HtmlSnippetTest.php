<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\HtmlSnippetHandler;
use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\HtmlSnippetTestBase;
use Netgen\Layouts\Tests\Persistence\Doctrine\TestCaseTrait;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(HtmlSnippetHandler::class)]
final class HtmlSnippetTest extends HtmlSnippetTestBase
{
    use TestCaseTrait;

    protected function tearDown(): void
    {
        $this->closeDatabase();
    }
}
