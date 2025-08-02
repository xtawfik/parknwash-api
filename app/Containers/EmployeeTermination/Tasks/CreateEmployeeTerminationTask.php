<?php

namespace App\Containers\EmployeeTermination\Tasks;

use App\Containers\EmployeeTermination\Data\Repositories\EmployeeTerminationRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateEmployeeTerminationTask extends Task
{

    protected $repository;

    public function __construct(EmployeeTerminationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

