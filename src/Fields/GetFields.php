<?php

namespace Notification\Fields;

use Dotenv\Exception\InvalidFileException;
use Notification\Exception\FileNotFound;
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
     * @throws FileNotFound
     */
    protected function getSource():array
    {
        if(!file_exists(ROOT_PATH . getenv('CONFIG_FIELD_PATH'))) {
            throw new FileNotFound("File not found", 404);
        }

        $yaml = $this->getYaml();

        return $yaml::parseFile(ROOT_PATH . getenv('CONFIG_FIELD_PATH'));

    }

    /**
     * @return array
     * @throws FileNotFound
     */
    public function getFields()
    {
        return  $this->getSource();
    }

    /**
     * @return array
     * @throws FileNotFound
     */
    public function getTags()
    {
        return array_values($this->getSource());
    }

    /**
     * @return array
     * @throws FileNotFound
     */
    public function getKeys()
    {
        return array_keys($this->getSource());
    }
}