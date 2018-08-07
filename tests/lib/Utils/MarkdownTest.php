<?php

declare(strict_types=1);

namespace Netgen\BlockManager\Standard\Tests\Utils;

use Netgen\BlockManager\Standard\Utils\Markdown;
use Netgen\BlockManager\Utils\HtmlPurifier;
use PHPUnit\Framework\TestCase;

final class MarkdownTest extends TestCase
{
    /**
     * @var \Netgen\BlockManager\Standard\Utils\Markdown
     */
    private $markdown;

    public function setUp(): void
    {
        $this->markdown = new Markdown(new HtmlPurifier());
    }

    /**
     * @covers \Netgen\BlockManager\Standard\Utils\Markdown::__construct
     * @covers \Netgen\BlockManager\Standard\Utils\Markdown::parse
     */
    public function testParse(): void
    {
        $html = $this->markdown->parse('# Title');
        self::assertSame('<h1>Title</h1>', $html);
    }
}
