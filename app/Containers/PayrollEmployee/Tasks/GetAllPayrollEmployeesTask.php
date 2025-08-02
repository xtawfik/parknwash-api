<?php

namespace App\Containers\PayrollEmployee\Tasks;

use App\Containers\PayrollEmployee\Data\Repositories\PayrollEmployeeRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllPayrollEmployeesTask extends Task
{

    protected $repository;

    public function __construct(PayrollEmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
