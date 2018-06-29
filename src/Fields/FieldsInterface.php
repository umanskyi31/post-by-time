<?php

namespace Notification\Fields;


interface FieldsInterface
{
    /**
     * Get pairs kay and value
     * @return array
     */
    public function getFields() ;

    /**
     * Get only value
     * @return array
     */
    public function getTags() ;

    /**
     * Get only keys
     * @return array
     */
    public function getKeys();

}