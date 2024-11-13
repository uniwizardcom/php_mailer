<?php
declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Service\Email\EmailSenderInterface;
use Throwable;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use App\Service\Email\EmailFactoryInterface;
use Psr\Log\LoggerInterface;

class GmailSendMail extends Command
{
    protected static $defaultName = 'app:gmail-send-mail';

    public function __construct(
        private EmailSenderInterface $emailSender,
        private EmailFactoryInterface $emailFactory,
        private LoggerInterface $logger,
        ?string $name = null
    ) {
        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $this->emailFactory->factory();

            $this->emailSender->sendEmail($this->emailFactory->getEmailParameters());
        } catch (TransportExceptionInterface $transportException) {
            $this->logger->error($transportException->getMessage());

            return static::INVALID;
        } catch (Throwable $exception) {
            $this->logger->critical($exception->getMessage());

            return static::FAILURE;
        }

        return static::SUCCESS;
    }
}
