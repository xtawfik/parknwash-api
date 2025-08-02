<?php

namespace App\Containers\Payroll\Tasks;

use App\Containers\Payroll\Data\Repositories\PayrollRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreatePayrollTask extends Task
{

    protected $repository;

    public function __construct(PayrollRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

