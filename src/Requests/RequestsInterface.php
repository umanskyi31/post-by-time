<?php

namespace Notification\Requests;

interface RequestsInterface
{
    /**
     * @param array $content
     */
    public function setMessage(array $content);

    /**
     * @return string
     */
    public function getMessage():string;

    /**
     * @param string $url
     * @param string $method
     * @param array $data
     * @return string
     */
    public function send(string $url, string $method, array $data = array()):string;

}