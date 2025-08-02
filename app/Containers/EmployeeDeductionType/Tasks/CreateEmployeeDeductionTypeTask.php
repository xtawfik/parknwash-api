<?php

namespace App\Containers\EmployeeDeductionType\Tasks;

use App\Containers\EmployeeDeductionType\Data\Repositories\EmployeeDeductionTypeRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateEmployeeDeductionTypeTask extends Task
{

    protected $repository;

    public function __construct(EmployeeDeductionTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        #ManyToMany#

        return $repository;
    }
}

