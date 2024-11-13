<?php
declare(strict_types=1);

namespace App\Service\Email;

use App\DTO\Email\EmailParameters;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class EmailSenderView implements EmailSenderInterface
{
    public function __construct(
        private TemplatedEmail $email,
        private MailerInterface $mailer
    ) {
    }

    /**
     * @param EmailParameters $emailParameters
     * @return void
     * @throws TransportExceptionInterface
     */
    public function sendEmail(EmailParameters $emailParameters): void
    {
        foreach ($emailParameters->getToEmails() as $email) {
            $this->email
                ->from($emailParameters->getFromEmail())
                ->to($email)
                ->subject($emailParameters->getSubject())
                ->context($emailParameters->getContext())
                ->textTemplate($emailParameters->getViewParameters()->getTextPathTemplate())
                ->htmlTemplate($emailParameters->getViewParameters()->getHtmlPathTemplate());

            $this->mailer->send($this->email);
        }
    }
}
