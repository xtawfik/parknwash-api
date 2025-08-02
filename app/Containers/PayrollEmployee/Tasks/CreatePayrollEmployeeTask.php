<?php

namespace App\Containers\PayrollEmployee\Tasks;

use App\Containers\PayrollEmployee\Data\Repositories\PayrollEmployeeRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreatePayrollEmployeeTask extends Task
{

    protected $repository;

    public function __construct(PayrollEmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

