<?php

namespace Notification\Resources;

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

        self::$container = $containerArr['container'];
    }

    /**
     * @return mixed
     */
    public static function getContainer()
    {
        return self::$container;
    }

    public static function __callStatic($name, $arguments)
    {
        // TODO: Implement __callStatic() method.
    }
}