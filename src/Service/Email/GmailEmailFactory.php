<?php
declare(strict_types=1);

namespace App\Service\Email;

use App\DTO\Email\EmailParameters;

class GmailEmailFactory implements EmailFactoryInterface
{
    public function __construct(
        private EmailParameters $emailParameters
    ) {
    }

    public function factory(): void
    {
        $this->emailParameters->setToEmails([]);
        $this->emailParameters->setFromEmail('');
        $this->emailParameters->setContext([]);
        $this->emailParameters->setSubject('Email subject content');
    }

    public function getEmailParameters(): EmailParameters
    {
        return $this->emailParameters;
    }
}
