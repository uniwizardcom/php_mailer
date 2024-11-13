<?php
declare(strict_types=1);

namespace App\Service\Email;

use App\DTO\Email\EmailParameters;

interface EmailSenderInterface
{
    public function sendEmail(EmailParameters $emailParameters): void;
}
