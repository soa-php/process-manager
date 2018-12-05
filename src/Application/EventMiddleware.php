<?php

declare(strict_types=1);

namespace Soa\ProcessManager\Application;

use Soa\ProcessManager\Domain\DomainEvent;
use Soa\ProcessManager\Domain\Transition;

interface EventMiddleware
{
    public function __invoke(DomainEvent $event, callable $nextMiddleware): Transition;
}
