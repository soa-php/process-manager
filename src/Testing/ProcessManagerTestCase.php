<?php

declare(strict_types=1);

namespace Soa\ProcessManager\Testing;

use PHPUnit\Framework\TestCase;

class ProcessManagerTestCase extends TestCase
{
    /**
     * @var ProcessManagerScenario
     */
    protected $scenario;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->scenario = new ProcessManagerScenario();

        parent::__construct($name, $data, $dataName);
    }
}
