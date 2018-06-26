<?php

namespace Notification;

use Notification\Fields\FieldsInterface;

class PostByTime implements Notification
{

    protected $fields;

    public function __construct(FieldsInterface $fields)
    {
        $this->fields = $fields;
    }

    public function getFields():FieldsInterface
    {
        return $this->fields;
    }

    public function send(): void
    {
        print("Test");
    }

    public function timer(array $time): void
    {
        // TODO: Implement timer() method.
    }

    public function getMessage(): string
    {
        // TODO: Implement getMessage() method.
    }
}