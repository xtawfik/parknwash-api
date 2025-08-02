<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccProductionOrder\Data\Repositories\AccProductionOrderRepository;
use App\Ship\Parents\Tasks\Task;

class AccProductionOrderReportTask extends Task
{

    protected $repository;

    public function __construct(AccProductionOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
