<?php

declare(strict_types=1);

namespace Soa\ProcessManager\Application;

use Soa\ProcessManager\Domain\DomainEvent;
use Soa\ProcessManager\Domain\Transition;

interface EventBus
{
    public function handle(DomainEvent $event): Transition;
}
