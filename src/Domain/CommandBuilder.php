<?php

declare(strict_types=1);

namespace Soa\ProcessManager\Domain;

use Assert\Assert;

class CommandBuilder
{
    /**
     * @var Command
     */
    private $command;

    public static function buildCommand(Command $command): self
    {
        return new self($command);
    }

    private function __construct(Command $command)
    {
        $this->command = $command;
    }

    public function withStreamId(string $streamId): self
    {
        $this->command = $this->command->withStreamId($streamId);

        return $this;
    }

    public function withProcessId(string $processId): self
    {
        $this->command = $this->command->withProcessId($processId);

        return $this;
    }

    public function withRecipient(string $recipient): self
    {
        $this->command = $this->command->withRecipient($recipient);

        return $this;
    }

    public function create(): Command
    {
        Assert::that($this->command->recipient())->notNull();
        Assert::that($this->command->processId())->notNull();
        Assert::that($this->command->streamId())->notNull();

        return $this->command;
    }
}
