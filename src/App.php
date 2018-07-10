<?php

namespace Notification;

use Symfony\Component\Yaml\Yaml;

class App
{
    /**
     * @var array
     */
    protected static $container;

    /**
     * App constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $yml = new Yaml();

        $containerArr = $yml::parseFile(ROOT_PATH . '/data/config.yml');

        if (empty($containerArr['container'])) {
           throw new \Exception("Not found container");
        }

        foreach ($containerArr['container'] as $key => $container) {
            self::$container[$key] = new $container;
        }

    }

    /**
     * @return mixed
     */
    public static function getContainer()
    {
        return self::$container;
    }

    /**
     * @param string $key
     * @return mixed
     * @throws \Exception
     */
    public static function getContainerByKey(string $key)
    {
        if (empty(self::$container[$key])) {
            throw new \Exception('Container with this key is not found');
        }

        return self::$container[$key];
    }
}