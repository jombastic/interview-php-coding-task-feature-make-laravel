<?php

namespace App\Channels;

use App\Contracts\NotificationChannelInterface;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

class EmailChannel implements NotificationChannelInterface
{
    public function send(string $message): void
    {
        Log::info('Sending notification via email');

        $mailer_transport = Transport::fromDsn('smtp://sandbox.smtp.mailtrap.io:587');
        $mailer = new Mailer($mailer_transport);

        $email = (new Email())
            ->to('webmaster@domain.com')
            ->from('webmaster@domain.com')
            ->subject('You have a new notification')
            ->text($message);

        $mailer->send($email);
    }
}
