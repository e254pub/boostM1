<?php

namespace App\Message;

class TestMessage
{
    public function __construct(
        private readonly array $data
    ) {
    }

    public function getData(): array
    {
        return $this->data;
    }
}