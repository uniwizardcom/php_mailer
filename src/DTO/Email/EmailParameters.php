<?php
declare(strict_types=1);

namespace App\DTO\Email;

class EmailParameters
{
    public function __construct(
        private ViewParameters $viewParameters,
        private string $fromEmail = '',
        private array $toEmails = [],
        private string $subject = '',
        private array $context = []
    ) {
    }

    public function setFromEmail(string $fromEmail): void
    {
        $this->fromEmail = $fromEmail;
    }

    public function setToEmails(array $toEmails): void
    {
        $this->toEmails = $toEmails;
    }

    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    public function setContext(array $context): void
    {
        $this->context = $context;
    }

    public function getFromEmail(): string
    {
        return $this->fromEmail;
    }

    public function getToEmails(): array
    {
        return $this->toEmails;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getViewParameters(): ViewParameters
    {
        return $this->viewParameters;
    }

    public function getContext(): array
    {
        return $this->context;
    }
}
