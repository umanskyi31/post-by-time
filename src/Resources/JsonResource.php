<?php
namespace Notification\Resources;

use Notification\Exception\NotificationException;

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
     * @throws NotificationException
     */
    public function parse()
    {
        try {
            $resource = json_decode($this->getResource());

            if (!isset($resource->ok) && !$resource->ok) {
                throw new NotificationException('Sorry, but server temporary not available');
            }


            if (!$resource->result) {
               return $this->setResponse('Not answer');
            }
            //todo check which method is coming

            $response = '';

            //build answer
            foreach ($resource->result as $key => $data) {
                $response .= $key . ' => ' . $data . PHP_EOL;
            }

            return $this->setResponse($response);

        } catch (\Exception $e) {
            throw new NotificationException('Something went wrong. Error with resources');
        }
    }
}