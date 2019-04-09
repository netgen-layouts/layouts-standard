<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Utils;

use Netgen\BlockManager\Utils\HtmlPurifier;
use Netgen\Layouts\Standard\Utils\Markdown;
use PHPUnit\Framework\TestCase;

final class MarkdownTest extends TestCase
{
    /**
     * @var \Netgen\Layouts\Standard\Utils\Markdown
     */
    private $markdown;

    public function setUp(): void
    {
        $this->markdown = new Markdown(new HtmlPurifier());
    }

    /**
     * @covers \Netgen\Layouts\Standard\Utils\Markdown::__construct
     * @covers \Netgen\Layouts\Standard\Utils\Markdown::parse
     */
    public function testParse(): void
    {
        $html = $this->markdown->parse('# Title');
        self::assertSame('<h1>Title</h1>', $html);
    }
}
