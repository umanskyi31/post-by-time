<?php
//only on dev
error_reporting(E_ALL);

//Need root path to project
define("ROOT_PATH", __DIR__);

require 'vendor/autoload.php';

try {
    (new \Dotenv\Dotenv(__DIR__))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //...
}

$postByTime  = new \Notification\PostBot(
    (new \Notification\Fields\GetFields(
        (new \Symfony\Component\Yaml\Yaml())
    ))
);