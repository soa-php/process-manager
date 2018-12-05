<?php

declare(strict_types=1);

namespace Soa\ProcessManager\Domain;

class Transition
{
    /**
     * @var array
     */
    private $commands;

    /**
     * @var Process
     */
    private $process;

    public static function to(Process $process)
    {
        return new self($process);
    }

    private function __construct(Process $process, array $commands = [])
    {
        $this->commands = $commands;
        $this->process  = $process;
    }

    /**
     * @return Command[]
     */
    public function commands(): array
    {
        return $this->commands;
    }

    public function process(): Process
    {
        return $this->process;
    }

    public function withCommands(array $commands): self
    {
        $new           = clone $this;
        $new->commands = $commands;

        return $new;
    }
}
