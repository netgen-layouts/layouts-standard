<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Utils;

use Netgen\Layouts\Utils\HtmlPurifier;
use Parsedown;

final class Markdown
{
    private HtmlPurifier $htmlPurifier;

    private Parsedown $parser;

    public function __construct(HtmlPurifier $htmlPurifier)
    {
        $this->htmlPurifier = $htmlPurifier;
        $this->parser = new Parsedown();
    }

    public function parse(string $text): string
    {
        $html = $this->parser->text($text);

        return $this->htmlPurifier->purify($html);
    }
}
