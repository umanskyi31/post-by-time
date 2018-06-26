<?php

namespace Notification;

use Notification\Fields\FieldsInterface;

class PostBot implements Notification
{
    /**
     * @var FieldsInterface
     */
    protected $fields;

    /**
     * PostByTime constructor.
     * @param FieldsInterface $fields
     */
    public function __construct(FieldsInterface $fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return FieldsInterface
     */
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