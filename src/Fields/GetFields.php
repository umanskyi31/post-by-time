<?php

namespace Notification\Fields;

use Dotenv\Exception\InvalidFileException;
use Symfony\Component\Yaml\Yaml;

class GetFields implements FieldsInterface
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


    /**
     * @return array
     */
    protected function getSource():array
    {
        if(!file_exists(ROOT_PATH . getenv('CONFIG_FIELD_PATH'))) {
            throw new InvalidFileException("File not found");
        }

        $yaml = $this->getYaml();

        return $yaml::parseFile(ROOT_PATH . getenv('CONFIG_FIELD_PATH'));

    }

    /**
     * @return array
     */
    public function getFields()
    {
        return  $this->getSource();
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return array_values($this->getSource());
    }

    /**
     * @return array
     */
    public function getKeys()
    {
        return array_keys($this->getSource());
    }
}