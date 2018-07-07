<?php
date_default_timezone_set('UTC');

$config = [
    'method' => null,
    'data'   => null
];

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