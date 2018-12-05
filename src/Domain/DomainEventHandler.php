<?php

declare(strict_types=1);

namespace Soa\ProcessManager\Domain;

interface DomainEventHandler
{
    public function handle(DomainEvent $domainEvent, Process $process): Transition;
}
