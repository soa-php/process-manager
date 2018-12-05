<?php

declare(strict_types=1);

namespace Soa\ProcessManager\Domain;

abstract class Process
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var State
     */
    protected $state;

    public function id(): string
    {
        return $this->id;
    }

    public function currentState(): State
    {
        return $this->state;
    }

    public function withState(State $state): self
    {
        $clone        = clone $this;
        $clone->state = $state;

        return $clone;
    }

    public function withId(string $id): self
    {
        $clone     = clone $this;
        $clone->id = $id;

        return $clone;
    }
}
