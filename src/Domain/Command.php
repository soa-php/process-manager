<?php

declare(strict_types=1);

namespace Soa\ProcessManager\Domain;

abstract class Command
{
    /**
     * @var string
     */
    protected $streamId;

    /**
     * @var string
     */
    protected $processId;

    /**
     * @var string
     */
    protected $recipient;

    public function streamId(): string
    {
        return $this->streamId;
    }

    public function withStreamId(string $streamId): self
    {
        $clone           = clone $this;
        $clone->streamId = $streamId;

        return $clone;
    }

    public function processId(): string
    {
        return $this->processId;
    }

    public function withProcessId(string $processId): self
    {
        $clone            = clone $this;
        $clone->processId = $processId;

        return $clone;
    }

    public function recipient(): string
    {
        return $this->recipient;
    }

    public function withRecipient(string $recipient): self
    {
        $clone            = clone $this;
        $clone->recipient = $recipient;

        return $clone;
    }
}
