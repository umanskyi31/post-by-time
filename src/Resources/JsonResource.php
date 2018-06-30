<?php
namespace Notification\Resources;

class JsonResource implements ResourcesInterface
{

    protected $resource;

    /**
     * @return array|string
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @param string $resources
     * @return void
     */
    public function setResource(string $resources)
    {
        $this->resource = $resources;
    }

    /**
     * Build response structure
     *
     * @return mixed
     */
    public function parse()
    {
        try {

            $resource = json_decode($this->getResource());

            var_dump($resource);

        } catch (\Exception $e) {
            echo $e->getCode() . ' ' . $e->getMessage();
        }
    }
}