<?php

namespace App\Containers\EmployeeDeduction\Tasks;

use App\Containers\EmployeeDeduction\Data\Repositories\EmployeeDeductionRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateEmployeeDeductionTask extends Task
{

    protected $repository;

    public function __construct(EmployeeDeductionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

