<?php

declare(strict_types=1);

namespace Soa\ProcessManager\Domain;

abstract class DomainEvent
{
    /**
     * @var string
     */
    protected $processId;

    /**
     * @var string
     */
    protected $streamId;

    public function processId(): string
    {
        return $this->processId;
    }

    public function streamId(): string
    {
        return $this->streamId;
    }

    public function withProcessId(string $processId): self
    {
        $clone            = clone $this;
        $clone->processId = $processId;

        return $clone;
    }

    public function withStreamId(string $streamId): self
    {
        $clone           = clone $this;
        $clone->streamId = $streamId;

        return $clone;
    }
}
