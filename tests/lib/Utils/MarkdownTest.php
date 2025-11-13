<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Utils;

use Netgen\Layouts\Standard\Utils\Markdown;
use Netgen\Layouts\Utils\HtmlPurifier;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Markdown::class)]
final class MarkdownTest extends TestCase
{
    private Markdown $markdown;

    protected function setUp(): void
    {
        $this->markdown = new Markdown(new HtmlPurifier());
    }

    public function testParse(): void
    {
        $html = $this->markdown->parse('# Title');
        self::assertSame('<h1>Title</h1>', $html);
    }
}
