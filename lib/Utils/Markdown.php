<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Utils;

use League\CommonMark\CommonMarkConverter;
use Netgen\Layouts\Utils\HtmlPurifier;

use function mb_trim;

final class Markdown
{
    private CommonMarkConverter $converter;

    public function __construct(
        private HtmlPurifier $htmlPurifier,
    ) {
        $this->converter = new CommonMarkConverter(
            [
                'html_input' => 'strip',
                'allow_unsafe_links' => false,
            ],
        );
    }

    public function parse(string $text): string
    {
        return $this->htmlPurifier->purify(
            mb_trim($this->converter->convert($text)->getContent()),
        );
    }
}
