<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Utils;

use Netgen\BlockManager\Utils\HtmlPurifier;
use Parsedown;

final class Markdown
{
    /**
     * @var \Netgen\BlockManager\Utils\HtmlPurifier
     */
    private $htmlPurifier;

    /**
     * @var \Parsedown
     */
    private $parser;

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
