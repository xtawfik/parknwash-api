<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\EmployeeCost\Data\Repositories\EmployeeCostRepository;
use App\Ship\Parents\Tasks\Task;

class EmployeeCostReportTask extends Task
{

    protected $repository;

    public function __construct(EmployeeCostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
