<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration\Doctrine;

use Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Integration\HtmlSnippetTest as BaseHtmlSnippetTest;
use Netgen\BlockManager\Tests\Persistence\Doctrine\TestCaseTrait;

/**
 * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\HtmlSnippetHandler::buildParameters
 */
final class HtmlSnippetTest extends BaseHtmlSnippetTest
{
    use TestCaseTrait;

    public function tearDown()
    {
        $this->closeDatabase();
    }

    /**
     * Prepares the persistence handler used in tests.
     */
    public function preparePersistence()
    {
        $this->persistenceHandler = $this->createPersistenceHandler();
    }
}
