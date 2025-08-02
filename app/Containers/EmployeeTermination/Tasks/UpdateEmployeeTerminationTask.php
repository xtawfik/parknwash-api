<?php

namespace App\Containers\EmployeeTermination\Tasks;

use App\Containers\EmployeeTermination\Data\Repositories\EmployeeTerminationRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateEmployeeTerminationTask extends Task
{

    protected $repository;

    public function __construct(EmployeeTerminationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

