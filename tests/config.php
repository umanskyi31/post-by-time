<?php

require __DIR__ . '/../vendor/autoload.php';

//Need root path to project
define("ROOT_PATH", __DIR__ . '/../');

try {
    (new \Dotenv\Dotenv(ROOT_PATH))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    echo $e->getMessage() . ' ' . $e->getCode();
}