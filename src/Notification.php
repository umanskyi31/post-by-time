<?php

namespace Notification;

interface Notification
{
    /**
     * Send notification for user
    */
    public function send():void;

    /**
     * Set timer for send
     *
     * @param array $time - Params for timer
    */
    public function timer(array $time):void;

    /**
     * Get message from user
     *
     * @return string
     */
    public function getMessage():string;


}