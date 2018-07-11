<?php
//Need root path to project
define("ROOT_PATH", __DIR__);

//use path to log
$defaultLogPath = getenv('LOG_PATH') ?: ROOT_PATH . "/storage/logs/";

define("LOG_FILE", $defaultLogPath . getenv("LOG_FILE_NAME"));

date_default_timezone_set('UTC');

try {
    $app = new \Notification\App();
    $app->execute();
} catch (Exception $e) {
    die("Something went wrong");
}


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