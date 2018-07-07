<?php
//only on dev
error_reporting(E_ALL);

//Need root path to project
define("ROOT_PATH", __DIR__);

require ROOT_PATH . '/vendor/autoload.php';

//Include data which represent data from browser or cli
$config = include ROOT_PATH . "/app.php";

try {
    (new \Dotenv\Dotenv(ROOT_PATH))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    echo $e->getMessage() . ' ' . $e->getCode();
}

//Create object for PostBot
$postByTime  = new \Notification\PostBot(
    (new \Notification\Fields\GetFields(
        (new \Symfony\Component\Yaml\Yaml())
    )),
    (new \Notification\Requests\BotRequest()),
    (new \Notification\Resources\JsonResource())
);

echo "\033[0;34m==========START WORK==========\033[0m" . PHP_EOL;
echo "Start time: " . date('Y-m-d H:i:s') . PHP_EOL;

$argv = $config['data'] ?? [];
//start work with bot
$postByTime->send($config['method'], $argv);

//waite answer from server
//sleep(5);

//answer from server
echo $postByTime->getMessage();

echo PHP_EOL . "End time: " . date('Y-m-d H:i:s') . PHP_EOL;
echo "\033[0;34m===========END WORK===========\033[0m" . PHP_EOL;
