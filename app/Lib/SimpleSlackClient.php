<?php

namespace App\Lib;

class SimpleSlackClient
{
    private static $client;

    private static function init()
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://slack.com/api/',
            'headers' => [
                'Authorization' => 'Bearer MYSLACKAPITOKEN',
                'Content-Type'  => 'application/json; charset=utf-8',
                'Accept'        => 'application/json',
            ],
        ]);
        self::$client = $client;
    }

    public static function postMessage(string $recipient, string $text)
    {
        self::init();

        $response = self::$client->post('chat.postMessage', [
            'json' => [
                'recipient' => $recipient,
                'text' => $text,
            ],
        ]);
    }
}
