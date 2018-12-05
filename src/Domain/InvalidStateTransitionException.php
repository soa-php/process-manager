<?php

declare(strict_types=1);

namespace Soa\ProcessManager\Domain;

class InvalidStateTransitionException extends \DomainException
{
    /**
     * @var Process
     */
    private $process;

    /**
     * @var State
     */
    private $fromState;

    /**
     * @var State
     */
    private $toState;

    public static function ofProcess(Process $process): self
    {
        return new self($process);
    }

    private function __construct(Process $process, State $fromState = null, State $toState = null, bool $createMessage = false)
    {
        $this->process   = $process;
        $this->fromState = $fromState;
        $this->toState   = $toState;
        $message         = '';

        if ($createMessage) {
            $message = 'Invalid transition of process ' . $this->process->id() . ' from ' . $this->fromState->getName() . ' to ' . $this->toState->getName();
        }

        parent::__construct($message);
    }

    public function fromState(State $state): self
    {
        return new self($this->process, $state, $this->toState);
    }

    public function toState(State $state): self
    {
        return new self($this->process, $this->fromState, $state);
    }

    public function throw(): void
    {
        throw new self($this->process, $this->fromState, $this->toState, true);
    }
}
