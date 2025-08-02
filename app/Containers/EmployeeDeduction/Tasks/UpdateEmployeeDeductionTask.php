<?php

namespace App\Containers\EmployeeDeduction\Tasks;

use App\Containers\EmployeeDeduction\Data\Repositories\EmployeeDeductionRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateEmployeeDeductionTask extends Task
{

    protected $repository;

    public function __construct(EmployeeDeductionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

