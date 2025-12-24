<p align="center"><a href="https://zitcha.com" target="_blank"><img src="https://www.zitcha.com/hubfs/zitcha-black-logo.svg" width="400" alt="Zitcha Logo"></a></p>


# Zitcha Notification Engine

This application is the Zitcha notification engine. It is a Laravel application that is responsible for sending notifications
through a simple laravel command.  The notification can be sent to the preconfigured channels (currently email or slack).


## Running the application

The application can be invoked by running the laravel command in a terminal, passing the channel and message as arguments.

### Send notification via Slack
```bash
php artisan app:send-notification --channel=slack --message="This is the notification"
```


### Send notification via email
```bash
php artisan app:send-notification --channel=email --message="This is the notification"
```

## Task

It has been decided that the Zitcha Notification Engine will need to support a multitude of notification
channels (e.g. WhatsApp, SMS, Telegram, etc) in the future.  Your task today is to improve the code base to allow this 
to be possible in the future.

Zitcha engineers have reviewed this project and made the following observations:
* The current implementation will not be maintainable once there are more notification channels supported.
* The application should be refactored to utilize dependency injection to improve the usability and
  testability of the code.
* The coding style/naming conventions are not consistent. It should be tidied up to be more consistent and
  use PER 2.0 coding style.

Please refactor this code based on the senior developers observations.
Feel free to discuss you changes with the interviewers as you go.
You can ask the interviewers for clarification if needed.

NOTE: For this Notification Engine, it is acceptable that the destination is the same per channel. For example,
with the email channel, the destination email and subject can be hard coded, and for the Slack channel, the recipient
can also be hard coded.
