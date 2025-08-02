<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Employee\Data\Repositories\EmployeeRepository;
use App\Ship\Parents\Tasks\Task;

class EmployeeReportTask extends Task
{

    protected $repository;

    public function __construct(EmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
