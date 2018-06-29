<?php

namespace Notification;

interface Notification
{
    /**
     * Send notification for user
     * @param string $method
     * @param array $argv
     */
    public function send(string $method, array $argv):void;

    /**
     * Get message from user
     *
     * @return string
     */
    public function getMessage():string;


}