<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\CapitalTransaction\Data\Repositories\CapitalTransactionRepository;
use App\Ship\Parents\Tasks\Task;

class CapitalTransactionReportTask extends Task
{

    protected $repository;

    public function __construct(CapitalTransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
