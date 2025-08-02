<?php

namespace App\Containers\Payroll\Tasks;

use App\Containers\Payroll\Data\Repositories\PayrollRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllPayrollsTask extends Task
{

    protected $repository;

    public function __construct(PayrollRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
