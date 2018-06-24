<?php

namespace Notification;

class PostByTime implements Notification
{
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