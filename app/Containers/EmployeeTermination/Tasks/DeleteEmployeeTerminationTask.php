<?php

namespace App\Containers\EmployeeTermination\Tasks;

use App\Containers\EmployeeTermination\Data\Repositories\EmployeeTerminationRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteEmployeeTerminationTask extends Task
{

    protected $repository;

    public function __construct(EmployeeTerminationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
