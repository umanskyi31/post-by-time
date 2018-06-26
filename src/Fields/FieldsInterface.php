<?php

namespace Notification\Fields;


interface FieldsInterface
{
    /**
     * Get pairs kay and value
     * @return array
     */
    public function getFields():array ;

    /**
     * Get only value
     * @return array
     */
    public function getTags():array ;

    /**
     * Get only keys
     * @return array
     */
    public function getKeys():array ;

}