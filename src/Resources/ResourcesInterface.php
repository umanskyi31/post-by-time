<?php

namespace Notification\Resources;

interface ResourcesInterface
{
    /**
     * @return array|string
     */
    public function getResource();

    /**
     * @param string $resources
     * @return mixed
     */
    public function setResource(string $resources);

    /**
     * @return mixed
     */
    public function parse();

    /**
     * Return clear answer from server
     * @return mixed
     */
    public function getResponse();
}