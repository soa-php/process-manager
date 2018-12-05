<?php

declare(strict_types=1);

namespace Soa\ProcessManager\Infrastructure\Persistence;

use Soa\ProcessManager\Domain\Process;

interface Repository
{
    public function findOfId(string $id): Process;

    public function save(Process $process): void;
}
