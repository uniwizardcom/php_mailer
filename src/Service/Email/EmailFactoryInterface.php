<?php
declare(strict_types=1);

namespace App\Service\Email;

use App\DTO\Email\EmailParameters;

interface EmailFactoryInterface
{
    public function factory(): void;

    public function getEmailParameters(): EmailParameters;
}