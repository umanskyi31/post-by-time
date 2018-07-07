<?php

namespace Notification;

abstract class Validate
{
    /**
     * @var array
     */
    private static $canUseMthods = [
        //for reed request data
        'read' => [
            'getMe',
            'getUpdate',
        ],

        //send data to bot
        'write' => [
            'sendMessage'
        ]
    ];


    /**
     * @return mixed
     */
    public static function getMethodsForRead()
    {
        return self::$canUseMthods['read'];
    }

    /**
     * @return mixed
     */
    public static function getMethodsForWrite()
    {
        return self::$canUseMthods['write'];
    }

    /**
     * @return mixed
     */
    public static function getCanUseMthods()
    {
        return self::$canUseMthods;
    }
}
