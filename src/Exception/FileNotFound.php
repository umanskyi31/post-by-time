<?php

namespace Notification\Exception;

use Notification\App;
use Throwable;

class FileNotFound extends \Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        try {
            App::getContainerByKey('log')->error($message . ' code: ' . $code);
        } catch (\Exception $e) {
        }

        parent::__construct($message, $code, $previous);
    }
}