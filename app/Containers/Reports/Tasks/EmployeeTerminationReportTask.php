<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\EmployeeTermination\Data\Repositories\EmployeeTerminationRepository;
use App\Ship\Parents\Tasks\Task;

class EmployeeTerminationReportTask extends Task
{

    protected $repository;

    public function __construct(EmployeeTerminationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
