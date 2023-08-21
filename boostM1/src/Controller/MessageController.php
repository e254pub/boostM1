<?php

namespace App\Controller;

use App\Message\TestMessage;
use Symfony\Component\Messenger\MessageBusInterface;

class MessageController
{
    private MessageBusInterface $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function messageAction(): void
    {
        // Отправка сообщения
        $message = new TestMessage(['someData']);
        $this->messageBus->dispatch($message);
    }
}