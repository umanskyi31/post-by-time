<?php
namespace Notification\Resources;

class JsonResource implements ResourcesInterface
{
    /**
     * @var array|string
     */
    protected $resource;

    /**
     * Parse answer from server
     * @var mixed
     */
    protected $response;

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param $response
     */
    public function setResponse($response): void
    {
        $this->response = $response;
    }

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

            foreach ($resource as $data) {
                //TODO - parse data
            }


        } catch (\Exception $e) {
            echo $e->getCode() . ' ' . $e->getMessage();
        }
    }
}