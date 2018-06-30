<?php

namespace Notification;

use Notification\Fields\FieldsInterface;
use Notification\Requests\RequestsInterface;
use Notification\Resources\ResourcesInterface;

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
     * Answer from server
     * @var ResourcesInterface
     */
    protected $resources;

    /**
     * PostByTime constructor.
     * @param FieldsInterface $fields
     * @param RequestsInterface $request
     * @param ResourcesInterface $resources
     */
    public function __construct(
        FieldsInterface $fields,
        RequestsInterface $request,
        ResourcesInterface $resources
    ) {
        $this->fields = $fields;
        $this->request = $request;
        $this->resources = $resources;
    }

    /**
     * @return ResourcesInterface
     */
    public function getResources(): ResourcesInterface
    {
        return $this->resources;
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
        $response = $this->getRequest()->send(
            self::getDirectLink(),
            $method,
            $argv
        );

        $this->getResources()->setResource($response);
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
        return $this->getResources()->getResponse() ?? '';
    }
}