# PHPMailerAction
*This package is an extension of Agrandesr/agile-router (v1.0+).*

This Custom Actions is a implementation to use a [Telegram Bot](https://github.com/MoonLiightz/PHP-Telegram-Class) package over Agile Router to send messages using this bot.

## Installation
First we need to require the package:
``` bash
composer require agrandesr/customactions/TelegramBotAction
```
Next, we need to add to the Router before the run method.

``` php
require './vendor/autoload.php';

use Agrandesr\Router;

$router = new Router();

$router->addCustomAction('telegram','App\\CustomActions\\TelegramBotAction');

$router->run();
```
Now you can use the new action in your routes file.

``` json
{
    "mail":{
        "GET":{
            "execute":[
                {
                    "type":"telegram",
                    "content":{
                        "chatId":"example@test.com",
                        "message":"This is a random message",
                        "photo":"src/file/photo.png",
                        "audio":"src/file/audio.mp3"
                    }
                }
            ]
        }
    }
}
```
Finally, be sure that you add the API key of telegram into the .env file:
``` .env
TELEGRAM_TOKEN=%YOUR_API_TOKEN%
```

And that is all, you can create a endpoint to send a email very easy.

## Content parameters
Like you can see in the example, the action "PhpMailer" have the next parameters:
 - chatId['required']:
 - message['optional']:
 - photo['optional']:
 - audio['optional']:

