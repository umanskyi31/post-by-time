<?php

namespace Notification;

use Notification\Fields\FieldsInterface;
use Notification\Requests\BotRequest;
use Notification\Requests\RequestsInterface;

final class PostBot implements Notification
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
        $this->request = $request;
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

    /**
     * @param string $method
     * @param array $argv
     */
    public function send(string $method, array $argv): void
    {
        $this->getRequest()->send(
            self::getDirectLink(),
            $method,
            $argv
        );
    }

    /**
     * @return string
     */
    protected static function getDirectLink(): string
    {
        return getenv('BOT_URL') . getenv('TOKEN') . '/';
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