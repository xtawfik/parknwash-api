<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccCashFlow\Data\Repositories\AccCashFlowRepository;
use App\Ship\Parents\Tasks\Task;

class AccCashFlowReportTask extends Task
{

    protected $repository;

    public function __construct(AccCashFlowRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
