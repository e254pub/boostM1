<?php

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

class TestEvent extends Event
{
    public function __construct(
        private array $data
    ) {
    }

    public function getData(): array
    {
        return $this->data;
    }
}