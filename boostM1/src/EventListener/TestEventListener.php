<?php

namespace App\EventListener;

use App\Event\TestEvent;

class TestEventListener
{
    public function onTestEvent(TestEvent $event): void
    {
        $data = $event->getData();
        // обработка события
    }
}