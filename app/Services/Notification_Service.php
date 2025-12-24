<?php

namespace App\Services;

use App\Lib\SimpleSlackClient;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

class Notification_Service
{
    public function send_notification(string $notification_message, string $channel): void
    {
        if ($channel === 'slack') {
            Log::info('Sending notification via Slack');

            SimpleSlackClient::postMessage('admin-notifications', $notification_message);
        }

        if ($channel === 'email') {
            Log::info('Sending notification via email');

            $mailer_transport = Transport::fromDsn('smtp://sandbox.smtp.mailtrap.io:587');
            $mailer = new Mailer($mailer_transport);

            $email = (new Email())
                ->to('webmaster@domain.com')
                ->from('webmaster@domain.com')
                ->subject('You have a new notification')
                ->text($notification_message);

            $mailer->send($email);
        }
    }
}
