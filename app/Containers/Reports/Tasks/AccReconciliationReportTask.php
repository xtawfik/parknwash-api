<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccReconciliation\Data\Repositories\AccReconciliationRepository;
use App\Ship\Parents\Tasks\Task;

class AccReconciliationReportTask extends Task
{

    protected $repository;

    public function __construct(AccReconciliationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
