<?php

namespace Notification;

use Notification\Fields\FieldsInterface;
use Notification\Requests\BotRequest;
use Notification\Requests\RequestsInterface;

class PostBot implements Notification
{
    /**
     * @var FieldsInterface
     */
    protected $fields;

    /**
     * @var RequestsInterface
     */
    protected $request;

    /**
     * PostByTime constructor.
     * @param FieldsInterface $fields
     * @param BotRequest $request
     */
    public function __construct(
        FieldsInterface $fields,
        BotRequest $request
    ) {
        $this->fields = $fields;
    }

    /**
     * @return FieldsInterface
     */
    public function getFields():FieldsInterface
    {
        return $this->fields;
    }

    /**
     * @return RequestsInterface
     */
    public function getRequest(): RequestsInterface
    {
        return $this->request;
    }

    public function send(): void
    {
        $this->getRequest()->send('https://example.com');
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