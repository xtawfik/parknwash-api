<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\PayrollEmployee\Data\Repositories\PayrollEmployeeRepository;
use App\Ship\Parents\Tasks\Task;

class PayrollEmployeeReportTask extends Task
{

    protected $repository;

    public function __construct(PayrollEmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
