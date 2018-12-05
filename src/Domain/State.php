<?php

declare(strict_types=1);

namespace Soa\ProcessManager\Domain;

use Paillechat\Enum\Enum;

/**
 * @method static static INITIALIZED()
 */
class State extends Enum
{
    protected const INITIALIZED = 'initialized';

    public function is(State $state): bool
    {
        return $state === $this;
    }

    public function isNot(State $state): bool
    {
        return $state !== $this;
    }
}
