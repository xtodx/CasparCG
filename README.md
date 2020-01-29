# CasparCG PHP Library
Is an implementation of CasparCG 2.0 AMCP Protocol and OSC Protocol

Requirements
-----
 - CasparCG v2.0.7
 - PHP 7.0
 
Installation
---

Install using Composer

> php composer.phar require cosmonova-rnd/caspar-cg

Usage
---

#### AMCP

The easiest way to use AMCP protocol is to send handwritten command through Caspar CG connection

```php
$client = new \Xtodx\CasparCG\Client();

$response = $client->send('play 1-1 test');

if($response->success()) {
    echo 'OK';
} else {
    echo 'Failed';
}
```

But you can use one of existing command builders.

For example, we want to send play content 'test' on channel 1 and layer 10 in loop

```php
$client = new \Xtodx\CasparCG\Client();

$playCmdBuilder = new \Xtodx\CasparCG\Command\Basic\Builder\PlayBuilder();
$playCmdBuilder->channel(1);
$playCmdBuilder->layer(10);
$playCmdBuilder->clip('test');
$playCmdBuilder->loop();

$response = $client->send($playCmdBuilder->build());

if($response->success()) {
    echo 'OK';
} else {
    echo 'Failed';
}
```

#### OSC

OSC works over the UDP protocol.

I'll try to show how to catch messages in small simple example

```php

$server = new \Xtodx\CasparCG\Server('127.0.0.1', 6250);
$server->start();

$parser     = new \Xtodx\CasparCG\OSC\Parser();

// You can use simple built-in event manager to handle messages
$eventManager = new \Xtodx\CasparCG\EventManager();

$listener = new MyTestFrameMsgListener(); // Must implement \Xtodx\CasparCG\ListenerInterface

// Listen all \Xtodx\CasparCG\OSC\Message\Producer\FFmpeg\Frame messages
$eventManager->listen(\Xtodx\CasparCG\OSC\Message\Producer\FFmpeg\Frame::class, $listener);

while (false !== $msg = $server->read()) {
    $rawMsg = $parser->parse($msg);

    if ($rawMsg instanceof Bundle) {
        foreach ($rawMsg->getMessages() as $bundleMsg) {
            \Xtodx\CasparCG\OSC\Message\Producer\FFmpeg\Frame::create($bundleMsg, $eventManager);
        }
    } else {
        \Xtodx\CasparCG\OSC\Message\Producer\FFmpeg\Frame::create($rawMsg, $eventManager);
    }
}

$server->stop();

```
 

 


