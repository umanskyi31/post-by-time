<?php

namespace Notification;


interface SendData
{
    /**
     * @return string
     */
    public function getToken();

    /**
     * @return integer
     */
    public function getId();

    /**
     * @return array
     */
    public function getMethods();
}