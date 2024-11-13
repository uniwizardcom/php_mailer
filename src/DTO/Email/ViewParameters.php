<?php
declare(strict_types=1);

namespace App\DTO\Email;

class ViewParameters
{
    public function __construct(
        private string $textPathTemplate,
        private string $htmlPathTemplate
    ) {
    }

    public function getTextPathTemplate(): string
    {
        return $this->textPathTemplate;
    }

    public function getHtmlPathTemplate(): string
    {
        return $this->htmlPathTemplate;
    }
}
