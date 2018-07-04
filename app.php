<?php
//Need root path to project
define("ROOT_PATH", __DIR__ . '/local.post-by-time.com/');

date_default_timezone_set('UTC');

$config = [
    'method' => null,
    'data'   => null
];

//Method name - It's mean using method for send request to telegram api

if (PHP_SAPI !== 'cli') {
    if (empty($_GET['method'])) {
       die('Please input required param: /?method=getUpdate');
    }

    $config['method'] = $_GET['method'];
} else {
    //Check method name
    if (empty($argv[1])) {
        die('Please input required param: php index.php "getUpdate"' . PHP_EOL);
    }

    $config['method'] = $argv[1];
}

return $config;