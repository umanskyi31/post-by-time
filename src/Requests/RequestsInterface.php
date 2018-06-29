<?php

namespace Notification\Requests;

interface RequestsInterface
{
    /**
     * @param string $content
     */
    public function setMessage(string $content);

    /**
     * @return string
     */
    public function getMessage():string;

    /**
     * @param string $url
     * @param string $method
     * @param array $data
     */
    public function send(string $url, string $method, array $data = array()):void;

}