<?php

namespace Notification;

use Symfony\Component\Yaml\Yaml;

class GetFields
{
    /**
     * @var Yaml
     */
    protected $yaml;


    /**
     * GetFields constructor.
     * @param Yaml $yaml
     */
    public function __construct(Yaml $yaml)
    {
        $this->yaml = $yaml;
    }

    /**
     * @return mixed
     */
    public function getYaml():Yaml
    {
        return $this->yaml;
    }

}