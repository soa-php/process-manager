<?php

declare(strict_types=1);

namespace Soa\ProcessManager\Testing;

use PHPUnit\Framework\Assert as PHPUnitAssert;
use Soa\ProcessManager\Domain\DomainEvent;
use Soa\ProcessManager\Domain\DomainEventHandler;
use Soa\ProcessManager\Domain\Process;
use Soa\ProcessManager\Domain\Transition;

class ProcessManagerScenario
{
    /**
     * @var Transition
     */
    private $transition;

    /**
     * @var Process
     */
    private $process;

    /**
     * @var DomainEventHandler
     */
    private $domainEventHandler;

    /**
     * @var string
     */
    private $exceptedException;

    public function withDomainEventHandler(DomainEventHandler $domainEventHandler): self
    {
        $this->domainEventHandler = $domainEventHandler;

        return $this;
    }

    public function given(Process $process): self
    {
        $this->process = $process;

        return $this;
    }

    public function expectException(string $exceptionFqcn): self
    {
        $this->exceptedException = $exceptionFqcn;

        return $this;
    }

    public function when(DomainEvent $domainEvent): self
    {
        try {
            $this->transition = $this->domainEventHandler->handle($domainEvent, $this->process);
        } catch (\Throwable $exception) {
            if (get_class($exception) !== $this->exceptedException) {
                throw $exception;
            }

            PHPUnitAssert::assertTrue(true);

            return $this;
        }

        if ($this->exceptedException) {
            throw new \Exception("Failure asserting that $this->exceptedException is thrown");
        }

        return $this;
    }

    public function then(Transition $transition): self
    {
        PHPUnitAssert::assertEquals($transition, $this->transition);

        return $this;
    }
}
