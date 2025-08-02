<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\EmployeeDeductionType\Data\Repositories\EmployeeDeductionTypeRepository;
use App\Ship\Parents\Tasks\Task;

class EmployeeDeductionTypeReportTask extends Task
{

    protected $repository;

    public function __construct(EmployeeDeductionTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
