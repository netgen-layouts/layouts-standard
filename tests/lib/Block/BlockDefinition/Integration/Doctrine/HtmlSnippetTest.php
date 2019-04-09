<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\BlockManager\Tests\Persistence\Doctrine\TestCaseTrait;
use Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Integration\HtmlSnippetTest as BaseHtmlSnippetTest;

/**
 * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\HtmlSnippetHandler::buildParameters
 */
final class HtmlSnippetTest extends BaseHtmlSnippetTest
{
    use TestCaseTrait;

    public function tearDown(): void
    {
        $this->closeDatabase();
    }
}
