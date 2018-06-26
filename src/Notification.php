<?php

namespace Notification;

interface Notification
{
    /**
     * Send notification for user
    */
    public function send():void;

    /**
     * Get message from user
     *
     * @return string
     */
    public function getMessage():string;


}